<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        return view('postsmanagement');
    }

    public function getPosts(Request $request)
    {
        $query = Post::where('user_id', auth()->id())
            ->with('user')
            ->orderBy('created_at', 'desc');

        // Apply filters
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }

        if ($request->has('search') && $request->search != '') {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $posts = $query->paginate(10);

        return response()->json([
            'success' => true,
            'data' => $posts->items(),
            'pagination' => [
                'total' => $posts->total(),
                'per_page' => $posts->perPage(),
                'current_page' => $posts->currentPage(),
                'last_page' => $posts->lastPage(),
                'from' => $posts->firstItem(),
                'to' => $posts->lastItem()
            ]
        ]);
    }

 public function store(Request $request)
{
    try {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'price' => 'required|numeric|min:0',
            'county' => 'required|string', // ✅ Keep for validation
            'location_id' => 'required|exists:locations,id',
            'description' => 'required|string|min:10',
            'status' => 'required|in:draft,active,pending',
            'featured' => 'nullable|boolean',
            'photos' => 'nullable|array|max:20',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120'
        ]);

        $validated['user_id'] = auth()->id();
        $validated['featured'] = $request->boolean('featured');
        
        // ✅ Combine location + county and save to county column
        $validated['county'] = $request->location . ', ' . $request->county;
        
        // ❌ Remove 'location' from the data to be saved
        unset($validated['location']);

        // Handle photo uploads to S3 using AWS SDK directly
        $photoUrls = [];
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $index => $photo) {
                try {
                    $originalName = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
                    $extension = $photo->getClientOriginalExtension();
                    $filename = $originalName . '_' . time() . '_' . uniqid() . '.' . $extension;
                    
                    $photoPath = $this->uploadPhotoToS3($photo, $filename);
                    
                    $bucket = config('filesystems.disks.s3.bucket');
                    $region = config('filesystems.disks.s3.region');
                    $photoUrl = "https://{$bucket}.s3.{$region}.amazonaws.com/{$photoPath}";
                    
                    $photoUrls[] = $photoUrl;
                    
                    \Log::info("Photo uploaded successfully", [
                        'path' => $photoPath,
                        'url' => $photoUrl
                    ]);
                    
                } catch (\Exception $e) {
                    \Log::error('Photo upload failed', [
                        'filename' => $photo->getClientOriginalName(),
                        'error' => $e->getMessage()
                    ]);
                    
                    // Clean up already uploaded photos
                    $this->cleanupPhotos($photoUrls);
                    
                    return response()->json([
                        'success' => false,
                        'message' => 'Failed to upload photo: ' . $e->getMessage()
                    ], 500);
                }
            }
        }

        $validated['photos'] = $photoUrls;
        $post = Post::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Post created successfully',
            'data' => $post->load('location', 'user')
        ], 201);
        
    } catch (\Exception $e) {
        \Log::error('Store post error: ' . $e->getMessage());
        
        return response()->json([
            'success' => false,
            'message' => 'Error creating post: ' . $e->getMessage()
        ], 500);
    }
}
public function deletePhoto(Request $request, Post $post)
{
    if ($post->user_id !== auth()->id()) {
        return response()->json([
            'success' => false,
            'message' => 'Unauthorized'
        ], 403);
    }

    try {
        $photoIndex = $request->input('photo_index');
        $photos = $post->photos ?? [];
        
        if (!isset($photos[$photoIndex])) {
            return response()->json([
                'success' => false,
                'message' => 'Photo not found'
            ], 404);
        }

        $photoUrl = $photos[$photoIndex];
        
        // Delete from S3
        $this->deletePhotoFromS3($photoUrl);
        
        // Remove from array and reindex
        unset($photos[$photoIndex]);
        $photos = array_values($photos);
        
        $post->update(['photos' => $photos]);

        return response()->json([
            'success' => true,
            'message' => 'Photo deleted successfully',
            'remaining_count' => count($photos)
        ]);
        
    } catch (\Exception $e) {
        \Log::error('Delete photo error: ' . $e->getMessage());
        return response()->json([
            'success' => false,
            'message' => 'Error deleting photo: ' . $e->getMessage()
        ], 500);
    }
}
/**
 * Upload photo to S3 using AWS SDK
 */
private function uploadPhotoToS3($photo, $filename)
{
    try {
        $s3Client = new \Aws\S3\S3Client([
            'version' => 'latest',
            'region'  => config('filesystems.disks.s3.region'),
            'credentials' => [
                'key'    => config('filesystems.disks.s3.key'),
                'secret' => config('filesystems.disks.s3.secret'),
            ],
            'http' => [
                'verify' => false
            ]
        ]);

        $key = "posts/" . auth()->id() . "/" . $filename;
        
        $result = $s3Client->putObject([
            'Bucket' => config('filesystems.disks.s3.bucket'),
            'Key'    => $key,
            'Body'   => fopen($photo->getPathname(), 'r'),
            'ContentType' => $photo->getMimeType(),
            'CacheControl' => 'max-age=31536000',
        ]);

        return $key;

    } catch (\Exception $e) {
        throw new \Exception('S3 photo upload failed: ' . $e->getMessage());
    }
}
/**
 * Delete photo from S3
 */
private function deletePhotoFromS3($photoPath)
{
    try {
        if (str_starts_with($photoPath, 'http')) {
            // Extract path from URL
            $parsedUrl = parse_url($photoPath);
            $photoPath = ltrim($parsedUrl['path'], '/');
        }
        
        $s3Client = new \Aws\S3\S3Client([
            'version' => 'latest',
            'region'  => config('filesystems.disks.s3.region'),
            'credentials' => [
                'key'    => config('filesystems.disks.s3.key'),
                'secret' => config('filesystems.disks.s3.secret'),
            ],
            'http' => [
                'verify' => false
            ]
        ]);

        $s3Client->deleteObject([
            'Bucket' => config('filesystems.disks.s3.bucket'),
            'Key' => $photoPath
        ]);

    } catch (\Exception $e) {
        \Log::error('Failed to delete photo from S3: ' . $e->getMessage());
    }
}
/**
 * Clean up photos
 */
private function cleanupPhotos($photoUrls)
{
    foreach ($photoUrls as $photoUrl) {
        try {
            $this->deletePhotoFromS3($photoUrl);
        } catch (\Exception $e) {
            \Log::warning('Failed to cleanup photo', [
                'url' => $photoUrl,
                'error' => $e->getMessage()
            ]);
        }
    }
}

    public function show(Post $post)
    {
        // Check if user owns the post
        if ($post->user_id !== auth()->id()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 403);
        }

        return response()->json([
            'success' => true,
            'data' => $post
        ]);
    }

public function update(Request $request, Post $post)
{
    if ($post->user_id !== auth()->id()) {
        return response()->json([
            'success' => false,
            'message' => 'Unauthorized'
        ], 403);
    }

    try {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'price' => 'required|numeric|min:0',
            'county' => 'required|string',  // ✅ Keep for validation
            'location_id' => 'required|exists:locations,id',
            'description' => 'required|string|min:10',
            'status' => 'required|in:draft,active,pending',
            'featured' => 'nullable|boolean',
            'photos' => 'nullable|array|max:20',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120'
        ]);

        $validated['featured'] = $request->boolean('featured');
        
        // ✅ Combine location + county and save to county column
        $validated['county'] = $request->location . ', ' . $request->county;
        
        // ❌ Remove 'location' from the data to be saved
        unset($validated['location']);

        // Handle new photo uploads
        if ($request->hasFile('photos')) {
            // Delete old photos
            if ($post->photos) {
                foreach ($post->photos as $photoUrl) {
                    $this->deletePhotoFromS3($photoUrl);
                }
            }

            // Upload new photos
            $photoUrls = [];
            foreach ($request->file('photos') as $photo) {
                $originalName = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $photo->getClientOriginalExtension();
                $filename = $originalName . '_' . time() . '_' . uniqid() . '.' . $extension;
                
                $photoPath = $this->uploadPhotoToS3($photo, $filename);
                
                $bucket = config('filesystems.disks.s3.bucket');
                $region = config('filesystems.disks.s3.region');
                $photoUrls[] = "https://{$bucket}.s3.{$region}.amazonaws.com/{$photoPath}";
            }
            $validated['photos'] = $photoUrls;
        }

        $post->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Post updated successfully',
            'data' => $post->load('location', 'user')
        ]);
        
    } catch (\Exception $e) {
        \Log::error('Update post error: ' . $e->getMessage());
        
        return response()->json([
            'success' => false,
            'message' => 'Error updating post: ' . $e->getMessage()
        ], 500);
    }
}

public function destroy(Post $post)
{
    if ($post->user_id !== auth()->id()) {
        return response()->json([
            'success' => false,
            'message' => 'Unauthorized'
        ], 403);
    }

    // Delete photos from S3
    if ($post->photos) {
        foreach ($post->photos as $photoUrl) {
            $this->deletePhotoFromS3($photoUrl);
        }
    }

    $post->delete();

    return response()->json([
        'success' => true,
        'message' => 'Post deleted successfully'
    ]);
}

    public function bulkAction(Request $request)
    {
        $validated = $request->validate([
            'action' => 'required|in:activate,deactivate,delete,feature',
            'post_ids' => 'required|array',
            'post_ids.*' => 'exists:posts,id'
        ]);

        $posts = Post::whereIn('id', $validated['post_ids'])
            ->where('user_id', auth()->id())
            ->get();

        foreach ($posts as $post) {
            switch ($validated['action']) {
                case 'activate':
                    $post->update(['status' => 'active']);
                    break;
                case 'deactivate':
                    $post->update(['status' => 'draft']);
                    break;
                case 'feature':
                    $post->update(['featured' => true, 'status' => 'active']);
                    break;
                case 'delete':
                    // Delete photos from S3
                    if ($post->photos) {
                        foreach ($post->photos as $photoUrl) {
                            $path = parse_url($photoUrl, PHP_URL_PATH);
                            $path = ltrim($path, '/');
                            if (Storage::disk('s3')->exists($path)) {
                                Storage::disk('s3')->delete($path);
                            }
                        }
                    }
                    $post->delete();
                    break;
            }
        }

        return response()->json([
            'success' => true,
            'message' => ucfirst($validated['action']) . ' applied successfully'
        ]);
    }

public function getStats()
{
    $stats = [
        'active' => Post::where('user_id', auth()->id())
            ->where('status', 'active')
            ->count(),
        'pending' => Post::where('user_id', auth()->id())
            ->where('status', 'pending')
            ->count(),
        'draft' => Post::where('user_id', auth()->id())
            ->where('status', 'draft')
            ->count(),
        'expired' => Post::where('user_id', auth()->id())
            ->where('status', 'expired')
            ->count(),
    ];

    return response()->json([
        'success' => true,
        'data' => $stats
    ]);
}
}