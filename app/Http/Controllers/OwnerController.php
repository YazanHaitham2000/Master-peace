<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    // Show all owners with search and filter functionality
    public function index(Request $request)
{
    $query = User::where('role_id', 1); // Assuming role_id 1 is for owners

    $search = $request->input('search'); // Get search input

    if ($request->has('search')) {
        $query->where('name', 'like', '%' . $search . '%');
    }

    $owners = $query->get();

    return view('owners.index', compact('owners', 'search'));
}


    // Show form to create a new owner
    public function create()
    {
        return view('owners.create');
    }

    // Store new owner
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => 1, // Owner role
        ]);

        return redirect()->route('owners.index')->with('success', 'Owner created successfully.');
    }

    // Show owner details
    public function show(User $owner)
    {
        return view('owners.show', compact('owner'));
    }

    // Show form to edit owner details
    public function edit(User $owner)
    {
        return view('owners.edit', compact('owner'));
    }

    // Update owner details
    public function update(Request $request, User $owner)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $owner->id,
        ]);

        $owner->update($request->only('name', 'email'));

        return redirect()->route('owners.index')->with('success', 'Owner updated successfully.');
    }

    // Delete owner
    public function destroy(User $owner)
    {
        $owner->delete();

        return redirect()->route('owners.index')->with('success', 'Owner deleted successfully.');
    }
}

