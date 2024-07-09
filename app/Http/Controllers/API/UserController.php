<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all users
        $users = User::all();
        // Return the user information in JSON
        return response()->json($users, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_user' => 'required|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        $user = User::create($request->all());
        // dd($user);

        // JSON informations !
        return response()->json([
            'status' => 'Success',
            'data' => $user,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        // Return the user information in JSON
        return response()->json($user, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name_user' => 'required|max:100',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8',
        ]);

        // Update the user
        $user->update([
            'name_user' => $request->name_user,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        // Return the updated information in JSON
        return response()->json([
            'status' => 'Update OK',
            'data' => $user,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // Delete the user
        $user->delete();
        // Return the response in JSON
        return response()->json([
            'status' => 'Delete OK',
        ]);
    }
}
