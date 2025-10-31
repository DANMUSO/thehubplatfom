<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        return view('location.location');
    }

public function getData(Request $request)
{
    $query = Location::with(['posts' => function($q) {
        $q->where('status', 'active')->select('id', 'title', 'location_id', 'price', 'photos');
    }])->where('user_id', auth()->id());

    if ($request->status) {
        $query->where('status', $request->status);
    }

    if ($request->search) {
        $query->where('business_name', 'like', '%' . $request->search . '%');
    }

    $locations = $query->latest()->paginate(10);

    return response()->json([
        'success' => true,
        'data' => $locations->items(),
        'pagination' => [
            'current_page' => $locations->currentPage(),
            'last_page' => $locations->lastPage(),
            'total' => $locations->total()
        ]
    ]);
}
public function getAllData(Request $request)
{
    $query = Location::with(['posts' => function($q) {
        $q->where('status', 'active')->select('id', 'title', 'location_id', 'price', 'photos');
    }]);

    if ($request->status) {
        $query->where('status', $request->status);
    }

    if ($request->search) {
        $query->where('business_name', 'like', '%' . $request->search . '%');
    }

    $locations = $query->latest()->paginate(10);

    return response()->json([
        'success' => true,
        'data' => $locations->items(),
        'pagination' => [
            'current_page' => $locations->currentPage(),
            'last_page' => $locations->lastPage(),
            'total' => $locations->total()
        ]
    ]);
}

    public function getStats()
    {
        $userId = auth()->id();

        return response()->json([
            'success' => true,
            'data' => [
                'active' => Location::where('user_id', $userId)->where('status', 'active')->count(),
                'pending' => Location::where('user_id', $userId)->where('status', 'pending')->count(),
                'draft' => Location::where('user_id', $userId)->where('status', 'draft')->count(),
                'total' => Location::where('user_id', $userId)->count()
            ]
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'business_name' => 'required|string|max:255',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'description' => 'nullable|string',
            'status' => 'required|in:active,pending,draft'
        ]);

        $validated['user_id'] = auth()->id();

        Location::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Location created successfully'
        ]);
    }

    public function update(Request $request, $id)
    {
        $location = Location::where('user_id', auth()->id())->findOrFail($id);

        $validated = $request->validate([
            'business_name' => 'required|string|max:255',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'description' => 'nullable|string',
            'status' => 'required|in:active,pending,draft'
        ]);

        $location->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Location updated successfully'
        ]);
    }

    public function destroy($id)
    {
        $location = Location::where('user_id', auth()->id())->findOrFail($id);
        $location->delete();

        return response()->json([
            'success' => true,
            'message' => 'Location deleted successfully'
        ]);
    }

    public function bulkAction(Request $request)
    {
        $validated = $request->validate([
            'action' => 'required|in:activate,deactivate,delete',
            'location_ids' => 'required|array'
        ]);

        $locations = Location::where('user_id', auth()->id())
            ->whereIn('id', $validated['location_ids']);

        switch ($validated['action']) {
            case 'activate':
                $locations->update(['status' => 'active']);
                $message = 'Locations activated successfully';
                break;
            case 'deactivate':
                $locations->update(['status' => 'draft']);
                $message = 'Locations deactivated successfully';
                break;
            case 'delete':
                $locations->delete();
                $message = 'Locations deleted successfully';
                break;
        }

        return response()->json([
            'success' => true,
            'message' => $message
        ]);
    }
           public function ads()
{
   
    
    return view('listedads.mapview');
}

public function locations(){
     $locations = Location::where('status', 'active')
        ->select('id', 'business_name')
        ->orderBy('business_name')
        ->where('user_id', auth()->id())
        ->get();
    
    return response()->json($locations);
}
}
