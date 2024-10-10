<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;

class HomeController extends Controller
{





    
    /**
     * Display a listing of the resource.
     */
    
    public function home()
    {
        return view('tenants2.home');

    }


    public function show($id)
    {
        $home = Home::with('images')->findOrFail($id);
        return view('tenants2.home_details', compact('home'));
    }
    
    public function bookAppointment($id)
    {
        $home = Home::findOrFail($id);
    
        // Check if already booked
        if ($home->is_booked) {
            return response()->json(['success' => false, 'message' => 'Already booked']);
        }
    
        // Mark as booked and save
        $home->is_booked = true;
        $home->save();
    
        return response()->json(['success' => true, 'message' => 'Appointment booked']);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
  

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
