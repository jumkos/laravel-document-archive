<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lecturers = \App\Models\Lecturer::all();
        return ApiResponse::ok($lecturers->toArray());
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
        return ApiResponse::ok($lecturer->toArray());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lecturer = \App\Models\Lecturer::find($id);
        if (!$lecturer) {
            return ApiResponse::notFound();
        }
        return ApiResponse::ok($lecturer->toArray());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $lecturer = \App\Models\Lecturer::find($id);
        if (!$lecturer) {
            return ApiResponse::notFound();
        }
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'employee_number' => 'required|string|max:255',
        ]);
        $lecturer->update($validated);
        return ApiResponse::ok($lecturer->toArray());
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
