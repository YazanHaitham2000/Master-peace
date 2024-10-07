<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class PropertiesForRentController2 extends Controller
{
    public function index()
    {
        $properties = Property::where('category_id', 1)->get(); // Category 1 for Rent
        return view('owners2.properties-for-rent', compact('properties'));
    }

    public function create()
    {
        return view('owners2.create-property-for-rent');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $property = new Property();
        $property->name = $request->name;
        $property->category_id = 1; // Rent category id
        $property->owner_id = auth()->user()->id;
        $property->save();

        if($request->hasfile('images'))
        {
            foreach($request->file('images') as $image)
            {
                $name = time().rand(1,100).'.'.$image->extension();
                $image->move(public_path('images'), $name);  
                $property->images()->create(['path' => $name]);
            }
        }

        return redirect()->route('properties-for-rent.index')->with('success', 'Property created successfully');
    }
}
