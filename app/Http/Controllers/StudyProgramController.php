<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use Illuminate\Http\Request;

class StudyProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = \App\Models\StudyProgram::all();
        return ApiResponse::ok($programs->toArray());
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
        return ApiResponse::ok($program->toArray());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $program = \App\Models\StudyProgram::find($id);
        if (!$program) {
            return ApiResponse::notFound();
        }
        return ApiResponse::ok($program->toArray());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $program = \App\Models\StudyProgram::find($id);
        if (!$program) {
            return ApiResponse::notFound();
        }
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $program->update($validated);
        return ApiResponse::ok($program->toArray());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $program = \App\Models\StudyProgram::find($id);
        if (!$program) {
            return ApiResponse::notFound();
        }
        $program->delete();
        return ApiResponse::ok(['message' => 'Deleted successfully']);
    }
}
