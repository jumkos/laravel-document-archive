<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = \App\Models\Student::all();
        return response()->json($students);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'student_number' => 'required|string|max:255',
            'study_program_id' => 'required|integer|exists:study_programs,id',
        ]);
        $student = \App\Models\Student::create($validated);
        return response()->json($student, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = \App\Models\Student::find($id);
        if (!$student) {
            return response()->json(['message' => 'Not Found'], 404);
        }
        return response()->json($student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = \App\Models\Student::find($id);
        if (!$student) {
            return response()->json(['message' => 'Not Found'], 404);
        }
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'student_number' => 'required|string|max:255',
            'study_program_id' => 'required|integer|exists:study_programs,id',
        ]);
        $student->update($validated);
        return response()->json($student);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = \App\Models\Student::find($id);
        if (!$student) {
            return response()->json(['message' => 'Not Found'], 404);
        }
        $student->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
