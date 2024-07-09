<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // Retrieve all sectors
            $sectors = Sector::all();
            // Return the sector information in JSON
            return response()->json($sectors, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => "Une erreur s'est produite lors de la recherche des secteurs"], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name_sector' => 'required|max:100',
            'description_sector' => 'required|max:500',
        ]);
        // dd($request);
        // Create a new sector
        $sector = Sector::create($request->all());
        // Return the information of the newly created sector in JSON
        return response()->json([
            'status' => 'Success',
            'data' => $sector,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sector $sector)
    {
        // Return the sector information in JSON
        return response()->json($sector, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sector $sector)
    {
        $request->validate([
            'name_sector' => 'required|max:100',
            'description_sector' => 'required|max:500',
        ]);

        // Update the sector
        $sector->update($request->all());
        // Return the updated information in JSON
        return response()->json([
            'status' => 'Update OK',
            'data' => $sector,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sector $sector)
    {
        // Delete the sector
        $sector->delete();
        // Return the response in JSON
        return response()->json([
            'status' => 'Delete OK',
        ]);
    }
}
