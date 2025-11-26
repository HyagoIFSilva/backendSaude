<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Symptom;

class SymptomController extends Controller
{
    public function index()
    {
        // Retorna ordenado pela data e hora mais recente
        return Auth::user()->symptoms()
            ->orderBy('date', 'desc')
            ->orderBy('time', 'desc')
            ->take(20) // Limita aos últimos 20 para não pesar
            ->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'intensity' => 'required|integer|min:1|max:4',
            'date' => 'required|date',
            'time' => 'required|string', // Ex: "14:30"
            'notes' => 'nullable|string|max:500',
        ]);

        $symptom = Auth::user()->symptoms()->create($validated);

        return response()->json($symptom, 201);
    }

    public function destroy(Symptom $symptom)
    {
        if ($symptom->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $symptom->delete();
        return response()->json(null, 204);
    }
}