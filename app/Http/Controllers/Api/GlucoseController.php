<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\GlucoseReading;

class GlucoseController extends Controller
{
    public function index()
    {
        // Retorna os últimos 7 registros para o gráfico e lista
        return Auth::user()->glucoseReadings()->orderBy('created_at', 'desc')->take(10)->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'level' => 'required|integer|min:20|max:800',
            'context' => 'required|string|in:jejum,pre_refeicao,pos_refeicao,antes_dormir',
        ]);

        $reading = Auth::user()->glucoseReadings()->create($validated);

        return response()->json($reading, 201);
    }

    public function destroy(GlucoseReading $reading)
    {
        if ($reading->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $reading->delete();
        return response()->json(null, 204);
    }
}