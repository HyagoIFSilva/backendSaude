<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\Models\Allergy;
use Illuminate\Support\Facades\Auth;

class AllergyController extends Controller
{
    public function index()
    {
        return Auth::user()->allergies()->orderBy('created_at', 'desc')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:50',
            'severity' => 'required|string|in:Leve,Moderada,Grave',
            'notes' => 'nullable|string|max:500',
        ]);

        $allergy = Auth::user()->allergies()->create($validated);

        return response()->json($allergy, 201);
    }

    public function destroy(Allergy $allergy)
    {
        if ($allergy->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $allergy->delete();
        return response()->json(null, 204);
    }
}