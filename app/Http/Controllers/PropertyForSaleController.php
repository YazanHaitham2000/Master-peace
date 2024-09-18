<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use App\Models\Home;
use App\Models\Category; // Ensure you import the Category model
use Illuminate\Http\Request;

class PropertyForSaleController extends Controller
{
    // Display a listing of properties for sale.
    public function index()
    {
        $homes = Home::where('category_id', 1)->get(); // Assuming category_id 1 is for sale
        return view('properties-for-sale.index', compact('homes'));
    }

    // Show the form for creating a new property for sale.
    public function create()
    {
        $categories = Category::all(); // Fetch all categories
        return view('properties-for-sale.create', compact('categories'));
    }

    // Store a newly created property for sale in the database.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id', // Validate category_id
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      
        ]);

        $home =  Home::create([
            'name' => $request->name,
            'category_id' => $request->category_id, // Use the category_id from the request
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

        return redirect()->route('properties-for-sale.index')->with('success', 'Property for sale created successfully.');
    }

    // Show the form for editing a specific property for sale.
    public function edit($id)
    {
        $home = Home::with('images')->findOrFail($id);
        $categories = Category::all(); // Fetch all categories
        return view('properties-for-sale.edit', compact('home', 'categories'));
    }

    // Update the specified property for sale in the database.
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id', // Validate category_id
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        $home = Home::findOrFail($id);
        $home->update([
            'name' => $request->name,
            'category_id' => $request->category_id, // Use the category_id from the request
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

        return redirect()->route('properties-for-sale.index')->with('success', 'Property for sale updated successfully.');
    }

    // Remove the specified property for sale from the database.
    public function destroy($id)
    {
        $home = Home::findOrFail($id);
        $home->delete();

        return redirect()->route('properties-for-sale.index')->with('success', 'Property for sale deleted successfully.');
    }
}