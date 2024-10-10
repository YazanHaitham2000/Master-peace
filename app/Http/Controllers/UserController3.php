<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller; // Import the Controller class
use App\Models\User;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class UserController3 extends Controller
{
    // Show the user's profile page
    public function profile()
    {
        $user = Auth::user();
        $appointments = Appointment::where('user_id', $user->id)->with('home')->get();
        return view('tenants2.profile', compact('user', 'appointments'));
    }

    // Update user profile
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully');
    }



    public function cancelAppointment($id)
    {
        $appointment = Appointment::find($id);
    
        if ($appointment && $appointment->user_id === Auth::id()) {
            $appointment->delete();
            return redirect()->back()->with('success', 'Reservation canceled successfully');
        }
    
        return redirect()->back()->with('error', 'Reservation not found or you do not have permission to cancel it');
    }
    


}
