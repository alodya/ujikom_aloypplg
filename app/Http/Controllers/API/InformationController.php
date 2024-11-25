<?php

namespace App\Http\Controllers\Api;

use App\Models\Information;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    // Get all info entries
    public function index()
    {
        $infos = Information::all();
        return response()->json($infos);
    }

    // Get a single info entry by ID
    public function show($id)
    {
        $info = Information::find($id);
        if (!$info) {
            return response()->json(['message' => 'Info not found'], 404);
        }
        return response()->json($info);
    }

    // Create a new info entry
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $info = Information::create($validatedData);
        return response()->json($info, 201);
    }

    // Update an existing info entry
    public function update(Request $request, $id)
    {
        $info = Information::find($id);
        if (!$info) {
            return response()->json(['message' => 'Info not found'], 404);
        }

        $validatedData = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required|string',
        ]);

        $info->update($validatedData);
        return response()->json($info);
    }

    // Delete an info entry
    public function destroy($id)
    {
        $info = Information::find($id);
        if (!$info) {
            return response()->json(['message' => 'Info not found'], 404);
        }

        $info->delete();
        return response()->json(['message' => 'Info deleted successfully']);
}
}