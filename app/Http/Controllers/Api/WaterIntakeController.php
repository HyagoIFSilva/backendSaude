<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WaterIntake;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class WaterIntakeController extends Controller
{
    /**
     * Busca ou cria o registro de consumo de água para o dia atual.
     */
    public function getTodaysIntake()
    {
        $user = Auth::user();
        $today = Carbon::today()->toDateString();

        $intake = $user->waterIntakes()->firstOrCreate(
            ['date' => $today],
            ['daily_goal' => $user->peso ? round($user->peso * 35) : null]
        );

        return response()->json($intake);
    }

    /**
     * Atualiza (adiciona ou zera) o consumo de água do dia atual.
     */
    public function updateTodaysIntake(Request $request)
    {
        $user = Auth::user();
        $today = Carbon::today()->toDateString();

        $validated = $request->validate([
            'amount_consumed' => 'required|integer|min:0',
            'daily_goal' => 'sometimes|integer|min:0|nullable' // Allow updating the goal too
        ]);

        $intakeData = [
            'amount_consumed' => $validated['amount_consumed'],
            // If goal is sent, update it, otherwise recalculate based on weight
            'daily_goal' => $request->has('daily_goal') ? $validated['daily_goal'] : ($user->peso ? round($user->peso * 35) : null)
        ];

        $intake = $user->waterIntakes()->updateOrCreate(
            ['date' => $today],
            $intakeData
        );

        return response()->json($intake);
    }

    /**
     * Busca o histórico de consumo de água dos últimos 7 dias.
     */
    public function getHistoricalIntake()
    {
        $user = Auth::user();
        $endDate = Carbon::today()->toDateString();
        $startDate = Carbon::today()->subDays(6)->toDateString(); // Gets the last 7 days (including today)

        $history = $user->waterIntakes()
                        ->whereBetween('date', [$startDate, $endDate])
                        ->orderBy('date', 'desc') // Most recent first
                        ->get();

        return response()->json($history);
    }
}