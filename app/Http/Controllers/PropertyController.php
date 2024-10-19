<?php

namespace App\Http\Controllers;
use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Add this line
use App\Models\Property; // <-- Make sure to import the Property model

class PropertyController extends Controller
{


   

  




    
    
// PropertyController.php
public function index(Request $request)
{
    // Initialize the query to fetch all properties
    $query = Home::query();

    // If a keyword is provided, filter by property name
    if ($request->has('keyword') && $request->keyword != '') {
        $query->where('name', 'like', '%' . $request->keyword . '%');
    }

    // If a location is selected, filter by location
    if ($request->has('location') && $request->location != '') {
        $query->where('location', $request->location);
    }

    // Get the filtered properties or all if no filters are applied
    $properties = $query->get();

    // Pass the data to the view
    return view('tenants2.property-list', compact('properties'));
}





    public function create()
    {
        return view('owners2.create-property'); // Point to the new view
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'price' => 'required|numeric',
            'area' => 'required|integer',
            'rooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'bedrooms' => 'required|integer',
            'location' => 'required|string|max:255',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Validate multiple images
        ]);
    
        // Create a new property (Home model)
        $property = new Home();
        $property->name = $request->name;
        $property->category_id = $request->category_id;
        $property->price = $request->price;
        $property->area = $request->area;
        $property->rooms = $request->rooms;
        $property->bathrooms = $request->bathrooms;
        $property->bedrooms = $request->bedrooms;
        $property->location = $request->location;
        $property->user_id = Auth::id(); // Set the logged-in user as the owner
    
        // Save the property record
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
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'price' => 'required|numeric',
            'area' => 'required|integer',
            'rooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'bedrooms' => 'required|integer',
            'location' => 'required|string|max:255',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Validate multiple images
        ]);
    
        $property = Home::findOrFail($id);
        $property->name = $validatedData['name'];
        $property->category_id = $validatedData['category_id'];
        $property->price = $validatedData['price'];
        $property->area = $validatedData['area'];
        $property->rooms = $validatedData['rooms'];
        $property->bathrooms = $validatedData['bathrooms'];
        $property->bedrooms = $validatedData['bedrooms'];
        $property->location = $validatedData['location'];
    
        // Handle image upload if new images are provided
        if ($request->hasFile('images')) {
            // Code to upload images and associate them with the property
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
