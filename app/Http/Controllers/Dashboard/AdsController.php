<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Post;

class AdsController extends Controller
{
   public function index()
    {
        // Get only active posts, ordered by newest first
        $posts = Post::orderBy('created_at', 'desc')
                    ->get();
        
        return view('listedads.index', compact('posts'));
    }
      public function product($post)
    {
        // Find the specific post by ID and eager load the user relationship
        $post = Post::with('user','location')->findOrFail($post);
        
        // Get related posts from same category
        $relatedPosts = Post::with('user')  // Also load user for related posts
            ->where('category', $post->category)
            ->where('id', '!=', $post->id)
            ->where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // If not enough from same category, add from other categories
        if ($relatedPosts->count() < 5) {
            $additionalPosts = Post::with('user')
                ->where('category', '!=', $post->category)
                ->where('id', '!=', $post->id)
                ->where('status', 'active')
                ->orderBy('created_at', 'desc')
                ->take(5 - $relatedPosts->count())
                ->get();
            
            $relatedPosts = $relatedPosts->merge($additionalPosts);
        }

        // Optional: Increment view count
        $post->increment('views');
        return view('listedads.product', compact('post', 'relatedPosts'));
    }

    public function vehicles(){
        // Get only active posts, ordered by newest first
        $posts = Post::orderBy('created_at', 'desc')
                    ->where('category', 'vehicles')
                    ->where('status', 'active')
                    ->get();
        
        return view('vehicles', compact('posts'));

    }
    public function electronics(){
        // Get only active posts, ordered by newest first
        $posts = Post::orderBy('created_at', 'desc')
                    ->where('category', 'electronics')
                    ->where('status', 'active')
                    ->get();
        
        return view('electronics', compact('posts'));

    }
     public function realestate(){
        // Get only active posts, ordered by newest first
        $posts = Post::orderBy('created_at', 'desc')
                    ->where('category', 'realestate')
                    ->where('status', 'active')
                    ->get();
        
        return view('realestate', compact('posts'));

    }
     public function phones(){
        // Get only active posts, ordered by newest first
        $posts = Post::orderBy('created_at', 'desc')
                    ->where('category', 'phones')
                    ->where('status', 'active')
                    ->get();
        
        return view('phones', compact('posts'));

    }
     public function others(){
        // Get only active posts, ordered by newest first
        $posts = Post::orderBy('created_at', 'desc')
                    ->where('category', 'others')
                    ->where('status', 'active')
                    ->get();
        
        return view('others', compact('posts'));

    }
    


}
