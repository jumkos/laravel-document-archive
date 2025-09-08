<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = \App\Models\DocumentType::all();
        return response()->json($types);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $type = \App\Models\DocumentType::create($validated);
        return response()->json($type, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $type = \App\Models\DocumentType::find($id);
        if (!$type) {
            return response()->json(['message' => 'Not Found'], 404);
        }
        return response()->json($type);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $type = \App\Models\DocumentType::find($id);
        if (!$type) {
            return response()->json(['message' => 'Not Found'], 404);
        }
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $type->update($validated);
        return response()->json($type);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $type = \App\Models\DocumentType::find($id);
        if (!$type) {
            return response()->json(['message' => 'Not Found'], 404);
        }
        $type->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
