<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use Illuminate\Http\Request;

class ThesisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $theses = \App\Models\Thesis::all();
        return ApiResponse::ok($theses->toArray());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|integer|exists:students,id,deleted_at,NULL',
            'document_type_id' => 'required|integer|exists:document_types,id,deleted_at,NULL',
            'year' => 'required|string|max:4',
            'title' => 'required|string|max:255|unique:theses',
        ]);
        $thesis = \App\Models\Thesis::create($validated);
        return ApiResponse::ok($thesis->toArray());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $thesis = \App\Models\Thesis::find($id);
        if (!$thesis) {
            return ApiResponse::notFound();
        }
        return ApiResponse::ok($thesis->toArray());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $thesis = \App\Models\Thesis::find($id);
        if (!$thesis) {
            return ApiResponse::notFound();
        }
        $validated = $request->validate([
            'student_id' => 'required|integer|exists:students,id,deleted_at,NULL',
            'document_type_id' => 'required|integer|exists:document_types,id,deleted_at,NULL',
            'year' => 'required|string|max:4',
        ]);
        $thesis->update($validated);
        return ApiResponse::ok($thesis->toArray());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $thesis = \App\Models\Thesis::find($id);
        if (!$thesis) {
            return ApiResponse::notFound();
        }
        $thesis->delete();
        return ApiResponse::ok(['message' => 'Deleted successfully']);
    }
}
