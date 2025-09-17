<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exame;
use Illuminate\Support\Facades\Auth;

class ExameController extends Controller
{
    /**
     * Salva um novo exame no banco de dados.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
            'tipo_exame' => 'required|string|max:255',
        ]);

        $path = $request->file('image')->store('exames', 'public');

        $exame = Exame::create([
            'user_id' => Auth::id(),
            'tipo_exame' => $validatedData['tipo_exame'],
            'image_path' => $path,
        ]);

        return response()->json($exame, 201);
    }

    /**
     * Lista todos os exames do usuário autenticado.
     */
    public function index()
    {
        $exames = Auth::user()->exames()->orderBy('created_at', 'desc')->get();
        return response()->json($exames);
    }

    /**
     * Atualiza um exame específico.
     */
    public function update(Request $request, Exame $exame)
    {
        if ($exame->user_id !== Auth::id()) {
            return response()->json(['message' => 'Não autorizado'], 403);
        }

        $validatedData = $request->validate([
            'tipo_exame' => 'required|string|max:255',
        ]);

        $exame->update($validatedData);

        return response()->json($exame);
    }

    /**
     * "Deleta" suavemente um exame (soft delete).
     */
    public function destroy(Exame $exame)
    {
        if ($exame->user_id !== Auth::id()) {
            return response()->json(['message' => 'Não autorizado'], 403);
        }

        $exame->delete();

        return response()->json(['message' => 'Exame movido para a lixeira.'], 200);
    }
}