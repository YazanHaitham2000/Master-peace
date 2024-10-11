<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\HomeUser;
use App\Models\Comment;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function admin ()
    {
        // Fetch counts of properties based on category_id
        $propertiesForSaleCount = Home::where('category_id', 2)->count();
        $propertiesForRentCount = Home::where('category_id', 1)->count();

        // Fetch counts of users based on role_id
        $numberOfOwners = User::where('role_id', 1)->count();
        $numberOfTenants = User::where('role_id', 2)->count();

        // Fetch owners and tenants with their homes and comments
        $users = User::with(['homes.category', 'comments'])
            ->whereIn('role_id', [1, 2]) // Assuming 2 is for owners and 3 for tenants
            ->get();

        $data = $users->map(function ($user) {
            // Get the homes for each user
            $homes = $user->homes->map(function ($home) {
                // Get the category of the home
                $category = $home->category->name;
                return [
                    'home_name' => $home->name,
                    'category_home' => $category,
                ];
            });

            // Get comments for each user
            $comments = $user->comments->map(function ($comment) {
                return $comment->content;
            });

            return [
                'user_name' => $user->name,
                'homes' => $homes,
                'comments' => $comments,
                'role_id' => $user->role_id,
            ];
        });

        return view('dashboard', compact(
            'propertiesForSaleCount',
            'propertiesForRentCount',
            'numberOfOwners',
            'numberOfTenants',
            'data'
        ));
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
    public function show(string $id)
    {
        //
    }

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
