<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use Illuminate\Http\Request;

class DiplomaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $diplomas = \App\Models\Diploma::all();
        return ApiResponse::ok($diplomas->toArray());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|integer|exists:students,id,deleted_at,NULL',
            'year' => 'required|string|max:4',
            'diploma_number' => 'required|string|max:255|unique:diplomas',
        ]);
        $diploma = \App\Models\Diploma::create($validated);
        return ApiResponse::ok($diploma->toArray());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $diploma = \App\Models\Diploma::find($id);
        if (!$diploma) {
            return ApiResponse::notFound();
        }
        return ApiResponse::ok($diploma->toArray());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $diploma = \App\Models\Diploma::find($id);
        if (!$diploma) {
            return ApiResponse::notFound();
        }
        $validated = $request->validate([
            'student_id' => 'required|integer|exists:students,id,deleted_at,NULL',
            'year' => 'required|string|max:4',
        ]);
        $diploma->update($validated);
        return ApiResponse::ok($diploma->toArray());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $diploma = \App\Models\Diploma::find($id);
        if (!$diploma) {
            return ApiResponse::notFound();
        }
        $diploma->delete();
        return ApiResponse::ok(['message' => 'Deleted successfully']);
    }
}
