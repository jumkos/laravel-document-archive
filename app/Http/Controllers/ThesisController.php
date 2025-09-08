<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThesisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $theses = \App\Models\Thesis::all();
        return response()->json($theses);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|integer|exists:students,id',
            'document_type_id' => 'required|integer|exists:document_types,id',
            'year' => 'required|string|max:4',
            'title' => 'required|string|max:255',
        ]);
        $thesis = \App\Models\Thesis::create($validated);
        return response()->json($thesis, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $thesis = \App\Models\Thesis::find($id);
        if (!$thesis) {
            return response()->json(['message' => 'Not Found'], 404);
        }
        return response()->json($thesis);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $thesis = \App\Models\Thesis::find($id);
        if (!$thesis) {
            return response()->json(['message' => 'Not Found'], 404);
        }
        $validated = $request->validate([
            'student_id' => 'required|integer|exists:students,id',
            'document_type_id' => 'required|integer|exists:document_types,id',
            'year' => 'required|string|max:4',
            'title' => 'required|string|max:255',
        ]);
        $thesis->update($validated);
        return response()->json($thesis);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $thesis = \App\Models\Thesis::find($id);
        if (!$thesis) {
            return response()->json(['message' => 'Not Found'], 404);
        }
        $thesis->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
