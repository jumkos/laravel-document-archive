<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use Illuminate\Http\Request;

class DocumentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = \App\Models\DocumentType::all();
        return ApiResponse::ok($types->toArray());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $type = \App\Models\DocumentType::create($validated);
        return ApiResponse::ok($type->toArray());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $type = \App\Models\DocumentType::find($id);
        if (!$type) {
            return ApiResponse::notFound();
        }
        return ApiResponse::ok($type->toArray());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $type = \App\Models\DocumentType::find($id);
        if (!$type) {
            return ApiResponse::notFound();
        }
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $type->update($validated);
        return ApiResponse::ok($type->toArray());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $type = \App\Models\DocumentType::find($id);
        if (!$type) {
            return ApiResponse::notFound();
        }
        $type->delete();
        return ApiResponse::ok(['message' => 'Deleted successfully']);
    }
}
