<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiplomaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $diplomas = \App\Models\Diploma::all();
        return response()->json($diplomas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|integer|exists:students,id',
            'year' => 'required|string|max:4',
            'diploma_number' => 'required|string|max:255',
        ]);
        $diploma = \App\Models\Diploma::create($validated);
        return response()->json($diploma, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $diploma = \App\Models\Diploma::find($id);
        if (!$diploma) {
            return response()->json(['message' => 'Not Found'], 404);
        }
        return response()->json($diploma);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $diploma = \App\Models\Diploma::find($id);
        if (!$diploma) {
            return response()->json(['message' => 'Not Found'], 404);
        }
        $validated = $request->validate([
            'student_id' => 'required|integer|exists:students,id',
            'year' => 'required|string|max:4',
            'diploma_number' => 'required|string|max:255',
        ]);
        $diploma->update($validated);
        return response()->json($diploma);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $diploma = \App\Models\Diploma::find($id);
        if (!$diploma) {
            return response()->json(['message' => 'Not Found'], 404);
        }
        $diploma->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
