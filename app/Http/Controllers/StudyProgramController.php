<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudyProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = \App\Models\StudyProgram::all();
        return response()->json($programs);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $program = \App\Models\StudyProgram::create($validated);
        return response()->json($program, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $program = \App\Models\StudyProgram::find($id);
        if (!$program) {
            return response()->json(['message' => 'Not Found'], 404);
        }
        return response()->json($program);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $program = \App\Models\StudyProgram::find($id);
        if (!$program) {
            return response()->json(['message' => 'Not Found'], 404);
        }
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $program->update($validated);
        return response()->json($program);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $program = \App\Models\StudyProgram::find($id);
        if (!$program) {
            return response()->json(['message' => 'Not Found'], 404);
        }
        $program->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
