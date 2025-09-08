<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupervisorDecreeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $decrees = \App\Models\SupervisorDecree::all();
        return response()->json($decrees);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'letter_number' => 'required|string|max:255',
            'date' => 'required|date',
            'student_id' => 'required|integer|exists:students,id',
            'document_type_id' => 'required|integer|exists:document_types,id',
            'title' => 'required|string|max:255',
            'year' => 'required|string|max:4',
            'lecturer_ids' => 'array',
            'lecturer_ids.*' => 'integer|exists:lecturers,id',
        ]);
        $lecturerIds = $request->input('lecturer_ids', []);
        $decree = \App\Models\SupervisorDecree::create($validated);
        if (!empty($lecturerIds)) {
            $decree->lecturers()->sync($lecturerIds);
        }
        $decree->load('lecturers');
        return response()->json($decree, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $decree = \App\Models\SupervisorDecree::find($id);
        if (!$decree) {
            return response()->json(['message' => 'Not Found'], 404);
        }
        return response()->json($decree);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $decree = \App\Models\SupervisorDecree::find($id);
        if (!$decree) {
            return response()->json(['message' => 'Not Found'], 404);
        }
        $validated = $request->validate([
            'letter_number' => 'required|string|max:255',
            'date' => 'required|date',
            'student_id' => 'required|integer|exists:students,id',
            'document_type_id' => 'required|integer|exists:document_types,id',
            'title' => 'required|string|max:255',
            'year' => 'required|string|max:4',
            'lecturer_ids' => 'array',
            'lecturer_ids.*' => 'integer|exists:lecturers,id',
        ]);
        $lecturerIds = $request->input('lecturer_ids', []);
        $decree->update($validated);
        if (!empty($lecturerIds)) {
            $decree->lecturers()->sync($lecturerIds);
        }
        $decree->load('lecturers');
        return response()->json($decree);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $decree = \App\Models\SupervisorDecree::find($id);
        if (!$decree) {
            return response()->json(['message' => 'Not Found'], 404);
        }
        $decree->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
