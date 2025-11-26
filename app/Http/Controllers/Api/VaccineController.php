<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Vaccine;
use Carbon\Carbon;

class VaccineController extends Controller
{
    public function index()
    {
        // Ordena: Atrasadas primeiro, depois Pendentes, depois Tomadas (mais recentes)
        return Auth::user()->vaccines()
            ->orderByRaw("FIELD(status, 'atrasada', 'pendente', 'tomada')")
            ->orderBy('date', 'desc')
            ->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'status' => 'required|in:tomada,pendente,atrasada',
            'batch' => 'nullable|string|max:100',
            'location' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $vaccine = Auth::user()->vaccines()->create($validated);

        return response()->json($vaccine, 201);
    }

    public function update(Request $request, Vaccine $vaccine)
    {
        if ($vaccine->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'status' => 'required|in:tomada,pendente,atrasada',
            'batch' => 'nullable|string|max:100',
            'location' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $vaccine->update($validated);

        return response()->json($vaccine);
    }

    public function destroy(Vaccine $vaccine)
    {
        if ($vaccine->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $vaccine->delete();
        return response()->json(null, 204);
    }
}