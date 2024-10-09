<?php

namespace App\Http\Controllers;
use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Add this line

class PropertyController extends Controller
{



    public function search(Request $request)
    {
        // Capture the search parameters
        $keyword = $request->input('keyword');
        $category_id = $request->input('category_id');
        $location = $request->input('location');
    
        // Build the query
        $query = Property::query();
    
        if ($keyword) {
            $query->where('property_name', 'LIKE', "%{$keyword}%");
        }
    
        if ($category_id) {
            $query->where('category_id', $category_id);
        }
    
        if ($location) {
            $query->where('location', $location);
        }
    
        // Fetch the results
        $properties = $query->get();
    
        // Return to the search results view with the filtered properties
        return view('properties.search_results', compact('properties'));
    }
    
// PropertyController.php
public function index()
{
    $properties = Home::all(); // Fetch all properties from the home table
    return view('tenants2.property-list', compact('properties')); // Pass the data to the view
}




    public function create()
    {
        return view('owners2.create-property'); // Point to the new view
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate multiple images
        ]);
    
        // Create a new property (Home model)
        $property = new Home();
        $property->name = $request->name;
        $property->category_id = $request->category_id;
        $property->user_id = Auth::id(); // Set the logged-in user as the owner
        $property->save();
    
        // Handle image uploads if images exist
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Store each image and get the public URL
                $path = $image->store('images', 'public'); // Store image in 'public/images' directory
                $url = asset('storage/' . $path); // Generate the full URL
    
                // Save the URL to the 'url' column in the images table
                $property->images()->create([
                    'url' => $url, // Save the full URL of the image
                ]);
            }
        }
    
        // Redirect to the dashboard with a success message
        return redirect()->route('owners2.dashboard')->with('success', 'Property added successfully.');
    }

    public function edit($id)
    {
        $property = Home::findOrFail($id);
        return view('owners2.edit', compact('property'));
    }

    public function update(Request $request, $id)
    {
        $property = Home::findOrFail($id);
        $property->name = $request->name;
        $property->category_id = $request->category_id;

        // Handle image upload if new images are provided
        if ($request->hasFile('images')) {
            // Code to upload images
        }

        $property->save();

        return redirect()->route('owners2.dashboard')->with('success', 'Property updated successfully');
    }

    public function destroy($id)
    {
        $property = Home::findOrFail($id);
        $property->delete();

        return redirect()->route('owners2.dashboard')->with('success', 'Property deleted successfully');
    }
}
