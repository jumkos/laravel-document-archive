<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use Illuminate\Http\Request;

class IncomingLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $letters = \App\Models\IncomingLetter::all();
        return ApiResponse::ok($letters->toArray());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'letter_number' => 'required|string|max:255',
            'date' => 'required|date',
            'subject' => 'required|string|max:255',
            'sender' => 'required|string|max:255',
        ]);
        $letter = \App\Models\IncomingLetter::create($validated);
        return ApiResponse::ok($letter->toArray());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $letter = \App\Models\IncomingLetter::find($id);
        if (!$letter) {
            return ApiResponse::notFound();
        }
        return ApiResponse::ok($letter->toArray());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $letter = \App\Models\IncomingLetter::find($id);
        if (!$letter) {
            return ApiResponse::notFound();
        }
        $validated = $request->validate([
            'letter_number' => 'required|string|max:255',
            'date' => 'required|date',
            'subject' => 'required|string|max:255',
            'sender' => 'required|string|max:255',
        ]);
        $letter->update($validated);
        return ApiResponse::ok($letter->toArray());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $letter = \App\Models\IncomingLetter::find($id);
        if (!$letter) {
            return ApiResponse::notFound();
        }
        $letter->delete();
        return ApiResponse::ok(['message' => 'Deleted successfully']);
    }
}
