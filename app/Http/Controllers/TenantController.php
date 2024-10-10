<?php

namespace App\Http\Controllers;
use App\Models\Contact; // Make sure this model is imported

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function contact() {
        return view('tenants2.contact');
    }

    public function home() {
         // Fetch all contacts
         $contacts = Contact::all();

  

 
         // Pass both contacts and tenants variables to the view
         return view('tenants2.home', compact('contacts'));
      
    }
    
    
    // Show all tenants with search and filter functionality
    public function index(Request $request)
    {
        // Fetch all contacts
        $contacts = Contact::all();

        // Fetch tenants based on role_id and search query
        $query = User::where('role_id', 2); // Assuming role_id 2 is for tenants

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $tenants = $query->get();

        // Pass both contacts and tenants variables to the view
        return view('tenants2..home', compact('contacts', 'tenants'));
    }

    // Show form to create a new tenant
    public function create()
    {
        return view('tenants.create');
    }

    // Store new tenant
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
            'role_id' => 2, // Tenant role
        ]);

        return redirect()->route('tenants.index')->with('success', 'Tenant created successfully.');
    }

    // Show tenant details
    public function show(User $tenant)
    {
        return view('tenants.show', compact('tenant'));
    }

    // Show form to edit tenant details
    public function edit(User $tenant)
    {
        return view('tenants.edit', compact('tenant'));
    }

    // Update tenant details
    public function update(Request $request, User $tenant)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $tenant->id,
        ]);

        $tenant->update($request->only('name', 'email'));

        return redirect()->route('tenants.index')->with('success', 'Tenant updated successfully.');
    }

    // Delete tenant
    public function destroy(User $tenant)
    {
        $tenant->delete();

        return redirect()->route('tenants.index')->with('success', 'Tenant deleted successfully.');
    }
}


