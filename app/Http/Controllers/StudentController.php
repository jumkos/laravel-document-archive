<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = \App\Models\Student::all();
        return ApiResponse::ok($students->toArray());
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
        return ApiResponse::ok($student->toArray());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = \App\Models\Student::find($id);
        if (!$student) {
            return ApiResponse::notFound();
        }
        return ApiResponse::ok($student->toArray());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = \App\Models\Student::find($id);
        if (!$student) {
            return ApiResponse::notFound();
        }
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'student_number' => 'required|string|max:255',
            'study_program_id' => 'required|integer|exists:study_programs,id',
        ]);
        $student->update($validated);
        return ApiResponse::ok($student->toArray());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = \App\Models\Student::find($id);
        if (!$student) {
            return ApiResponse::notFound();
        }
        $student->delete();
        return ApiResponse::ok(['message' => 'Deleted successfully']);
    }
}
