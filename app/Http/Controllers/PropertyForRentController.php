<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Home;
use App\Models\Category; // Ensure you import the Category model
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class PropertyForRentController extends Controller
{
    // Display a listing of properties for rent.
    public function index(Request $request)
    {
        $homes = Home::where('category_id', 1)->get(); // Assuming category_id 1 is for rent
        $query = Home::where('category_id', 1); // Assuming category_id 1 is for rent properties

        $search = $request->input('search'); // Get search input
    
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $search . '%'); // Search by property name
        }
    
        $homes = $query->get();
        return view('properties-for-rent.index', compact('homes','search'));
    }

    // Show the form for creating a new property for rent.
    public function create()
    {
        $categories = Category::all(); // Fetch all categories
        $users = User::all();
        return view('properties-for-rent.create', compact('users','categories'));
    }

    // Store a newly created property for rent in the database.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id', // Validate user_id

            'price' => 'required|numeric',
            'area' => 'required|numeric',
            'rooms' => 'required|integer',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'location' => 'required|string|max:255',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Create the property with the new fields
        $home = Home::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id, // Save the selected owner

            'price' => $request->price,
            'area' => $request->area,
            'rooms' => $request->rooms,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'location' => $request->location,
        ]);
    
        // Handle the uploaded images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public');
                Image::create([
                    'url' => $path,
                    'home_id' => $home->id,
                ]);
            }
        }
    
        return redirect()->route('properties-for-rent.index')->with('success', 'Property for rent created successfully.');
    }
    

    // Show the form for editing a specific property for rent.
    public function edit($id)
    {
        $home = Home::with('images')->findOrFail($id);

        
        $categories = Category::all(); // Fetch all categories
        return view('properties-for-rent.edit', compact('home', 'categories'));
    }

    // Update the specified property for rent in the database.
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'area' => 'required|numeric',
            'rooms' => 'required|integer',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'location' => 'required|string|max:255',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $home = Home::findOrFail($id);
        $home->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'area' => $request->area,
            'rooms' => $request->rooms,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'location' => $request->location,
            'user_id' => auth()->id(),
        ]);
    
        // Remove selected images
        if ($request->has('remove_images')) {
            $removeImages = $request->remove_images;
            foreach ($removeImages as $imageId) {
                $image = Image::find($imageId);
                if ($image) {
                    // Delete the image file from storage
                    \Storage::disk('public')->delete($image->url);
                    // Delete the image record from the database
                    $image->delete();
                }
            }
        }
    
        // Handle new uploaded images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public');
                Image::create([
                    'url' => $path,
                    'home_id' => $home->id,
                ]);
            }
        }
    
        return redirect()->route('properties-for-rent.index')->with('success', 'Property for rent updated successfully.');
    }
    

    // Remove the specified property for rent from the database.
    public function destroy($id)
    {
        $home = Home::findOrFail($id);
        $home->delete();

        return redirect()->route('properties-for-rent.index')->with('success', 'Property for rent deleted successfully.');
    }
}
