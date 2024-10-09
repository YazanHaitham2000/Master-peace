<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homedetailsController extends Controller
{
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

}
