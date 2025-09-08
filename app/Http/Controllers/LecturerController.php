<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lecturers = \App\Models\Lecturer::all();
        return response()->json($lecturers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'employee_number' => 'required|string|max:255',
        ]);
        $lecturer = \App\Models\Lecturer::create($validated);
        return response()->json($lecturer, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lecturer = \App\Models\Lecturer::find($id);
        if (!$lecturer) {
            return response()->json(['message' => 'Not Found'], 404);
        }
        return response()->json($lecturer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $lecturer = \App\Models\Lecturer::find($id);
        if (!$lecturer) {
            return response()->json(['message' => 'Not Found'], 404);
        }
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'employee_number' => 'required|string|max:255',
        ]);
        $lecturer->update($validated);
        return response()->json($lecturer);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lecturer = \App\Models\Lecturer::find($id);
        if (!$lecturer) {
            return response()->json(['message' => 'Not Found'], 404);
        }
        $lecturer->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
