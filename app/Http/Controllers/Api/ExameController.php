<?php
// app/Http/Controllers/Api/ExameController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Exame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExameController extends Controller
{
    /**
     * Armazena um novo exame no banco de dados.
     */
    public function store(Request $request)
    {
  
        $validatedData = $request->validate([
            'tipo_exame' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Valida se é uma imagem
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            // Salva a imagem em 'storage/app/public/exames' e retorna o caminho
            $path = $request->file('image')->store('exames', 'public');
        }

        // 3. Cria o registro no banco de dados
        $exame = Exame::create([
            'user_id' => Auth::id(), // Pega o ID do usuário autenticado!
            'tipo_exame' => $validatedData['tipo_exame'],
            'image_path' => $path,
        ]);

        // 4. Retorna uma resposta de sucesso com os dados criados
        return response()->json($exame, 201);
    }
}