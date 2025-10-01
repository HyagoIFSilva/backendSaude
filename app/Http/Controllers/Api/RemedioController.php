<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Remedio;
use Illuminate\Http\Request; // <-- Importe o Request

class RemedioController extends Controller
{
    public function findUbsByRemedio(Request $request, Remedio $remedio)
    {
        // Valida se a latitude e longitude foram enviadas
        $validated = $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $latRef = $validated['latitude'];
        $lonRef = $validated['longitude'];
        $raioKm = 30;

        $haversine = "(6371 * acos(cos(radians($latRef)) * cos(radians(latitude)) * cos(radians(longitude) - radians($lonRef)) + sin(radians($latRef)) * sin(radians(latitude))))";

        $ubsComRemedio = $remedio->ubs()
            ->select('*')
            ->selectRaw("{$haversine} AS distancia")
            ->having("distancia", "<", $raioKm)
            ->orderBy("distancia", 'asc')
            ->get();

        return response()->json($ubsComRemedio);
    }
}