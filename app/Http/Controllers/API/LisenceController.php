<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Lisence;
use Illuminate\Http\Request;

class LisenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all licenses
        $licenses = Lisence::all();
        // Return the license information in JSON
        return response()->json($licenses);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type_lisence' => 'required|max:100',
            'description_lisence' => 'required|max:500',
            'id_sector' => 'required|integer',
            'id_user' => 'required|integer',
        ]);

        // Create a new license
        $license = Lisence::create($request->all());

        // Return the information of the newly created license in JSON
        return response()->json([
            'status' => 'Success',
            'data' => $license,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Lisence $lisence)
    {
        // Return the license information in JSON
        return response()->json($lisence);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lisence $lisence)
    {
        $request->validate([
            'type_lisence' => 'required|max:100',
            'description_lisence' => 'required|max:500',
            'id_sector' => 'required|integer',
            'id_user' => 'required|integer',
        ]);

        // Update the license
        $lisence->update($request->all());

        // Return the updated information in JSON
        return response()->json([
            'status' => 'Update OK',
            'data' => $lisence,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lisence $lisence)
    {
        // Delete the license
        $lisence->delete();

        // Return the response in JSON
        return response()->json([
            'status' => 'suppression OK',
        ]);
    }
}
