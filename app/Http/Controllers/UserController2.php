<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController2 extends Controller
{
    public function profile()
    {
        // Get the authenticated user
        $user = auth()->user();

        // Fetch appointments associated with the user
        $appointments = Appointment::with('home')->where('user_id', $user->id)->get();

        return view('owners2.profile', compact('user', 'appointments'));
    }

    public function updateProfile(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Get the authenticated user
        $user = auth()->user();

        // Update the user's information
        $user->name = $request->name;
        $user->email = $request->email;

        // Update the password if provided
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('owners2.profile')->with('success', 'Profile updated successfully.');
    }
}
