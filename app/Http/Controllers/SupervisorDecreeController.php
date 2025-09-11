<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use Illuminate\Http\Request;

class SupervisorDecreeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $decrees = \App\Models\SupervisorDecree::all();
        return ApiResponse::ok($decrees->toArray());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'letter_number' => 'required|string|max:255|unique:supervisor_decrees',
            'date' => 'required|date',
            'student_id' => 'required|integer|exists:students,id,deleted_at,NULL',
            'document_type_id' => 'required|integer|exists:document_types,id,deleted_at,NULL',
            'title' => 'required|string|max:255',
            'year' => 'required|string|max:4',
            'lecturer_ids' => 'array',
            'lecturer_ids.*' => 'integer|exists:lecturers,id,deleted_at,NULL',
        ]);
        $lecturerIds = $request->input('lecturer_ids', []);
        $decree = \App\Models\SupervisorDecree::create($validated);
        if (!empty($lecturerIds)) {
            $decree->lecturers()->sync($lecturerIds);
        }
        $decree->load('lecturers');
        return ApiResponse::ok($decree->toArray());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $decree = \App\Models\SupervisorDecree::find($id);
        if (!$decree) {
            return ApiResponse::notFound();
        }
        return ApiResponse::ok($decree->toArray());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $decree = \App\Models\SupervisorDecree::find($id);
        if (!$decree) {
            return ApiResponse::notFound();
        }
        $validated = $request->validate([
            'date' => 'required|date',
            'student_id' => 'required|integer|exists:students,id,deleted_at,NULL',
            'document_type_id' => 'required|integer|exists:document_types,id,deleted_at,NULL',
            'title' => 'required|string|max:255',
            'year' => 'required|string|max:4',
            'lecturer_ids' => 'array',
            'lecturer_ids.*' => 'integer|exists:lecturers,id,deleted_at,NULL',
        ]);
        $lecturerIds = $request->input('lecturer_ids', []);
        $decree->update($validated);
        if (!empty($lecturerIds)) {
            $decree->lecturers()->sync($lecturerIds);
        }
        $decree->load('lecturers');
        return ApiResponse::ok($decree->toArray());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $decree = \App\Models\SupervisorDecree::find($id);
        if (!$decree) {
            return ApiResponse::notFound();
        }
        $decree->delete();
        return ApiResponse::ok(['message' => 'Deleted successfully']);
    }
}
