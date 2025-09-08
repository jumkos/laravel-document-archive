<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DecreeLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $letters = \App\Models\DecreeLetter::all();
        return response()->json($letters);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'letter_number' => 'required|string|max:255',
            'date' => 'required|date',
            'subject' => 'required|string|max:255',
        ]);
        $letter = \App\Models\DecreeLetter::create($validated);
        return response()->json($letter, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $letter = \App\Models\DecreeLetter::find($id);
        if (!$letter) {
            return response()->json(['message' => 'Not Found'], 404);
        }
        return response()->json($letter);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $letter = \App\Models\DecreeLetter::find($id);
        if (!$letter) {
            return response()->json(['message' => 'Not Found'], 404);
        }
        $validated = $request->validate([
            'letter_number' => 'required|string|max:255',
            'date' => 'required|date',
            'subject' => 'required|string|max:255',
        ]);
        $letter->update($validated);
        return response()->json($letter);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $letter = \App\Models\DecreeLetter::find($id);
        if (!$letter) {
            return response()->json(['message' => 'Not Found'], 404);
        }
        $letter->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
