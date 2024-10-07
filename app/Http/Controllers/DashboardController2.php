<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth; // Add this line

use Illuminate\Http\Request;
use App\Models\Home; // Assuming your Property model is named Property

class DashboardController2 extends Controller
{
    public function show()
    {
        // Get the logged-in user
        $userId = Auth::id(); // Get the ID of the logged-in user
    
        // Fetch properties for sale and rent for the logged-in user
        $propertiesForSale = Home::with('images')
            ->where('user_id', $userId) // Ensure you have a user_id column in your homes table
            ->where('category_id', 2) // Category ID for sale
            ->get();
    
        $propertiesForRent = Home::with('images')
            ->where('user_id', $userId) // Ensure you have a user_id column in your homes table
            ->where('category_id', 1) // Category ID for rent
            ->get();
    
        // Merge both collections
        $properties = $propertiesForSale->merge($propertiesForRent);
    
        // Pass the merged properties to the view
        return view('owners2.dashboard', [
            'properties' => $properties
        ]);
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
    


}

