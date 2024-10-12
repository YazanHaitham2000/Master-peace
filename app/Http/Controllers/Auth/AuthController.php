<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate the request
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log in the user
        if (Auth::attempt($credentials)) {
            // Check the role of the authenticated user
            $user = Auth::user();
            switch ($user->role_id) {
                case 1: // Owner
                    return redirect()->route('owners2.dashboard'); // Adjust route as needed
                case 2: // Tenant
                    return redirect()->route('tenants2.home'); // Adjust route as needed
                case 3: // Admin
                    return redirect()->route('dashboard'); // Adjust route as needed
                default:
                    return redirect()->route('login')->with('error', 'Invalid role assigned.');
            }
        }

        // If login fails
        return redirect()->route('login')->with('error', 'Invalid credentials.');
    }

    public function register(Request $request)
    {
        // Validate the registration request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role_id' => 'required|integer',
            'address' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:15',
        ]);

        // Create the user
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);

        // Redirect with success message
        return redirect()->route('login')->with('status', 'Registration successful! Please log in.');
    }
    public function logout(Request $request)
    {
        Auth::logout(); // Log the user out
        return redirect()->route('login'); // Redirect to the login page
    }
}
