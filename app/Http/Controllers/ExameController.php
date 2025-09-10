<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Exame; 

class ExameController extends Controller
{
    public function store(Request $request)
    {
       
        $request->validate([
            'exame_imagem' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB Max
            'titulo' => 'nullable|string|max:255',
        ]);

        // 2. Salvar o arquivo no servidor
        if ($request->hasFile('exame_imagem')) {
            // A chave 'exame_imagem' é a mesma que usamos no formData.append()
            $file = $request->file('exame_imagem');

            // Salva o arquivo em 'storage/app/public/exames' e gera um nome único
            $path = $file->store('public/exames');

            // 3. Salvar o caminho do arquivo no banco de dados
            // Você não salva o arquivo em si no banco, apenas o caminho para ele!
            // Exemplo (você precisará de um model e migration para 'exames'):
            // $exame = new Exame();
            // $exame->user_id = auth()->id(); // Exemplo para pegar o usuário logado
            // $exame->titulo = $request->input('titulo');
            // $exame->caminho_arquivo = $path;
            // $exame->save();

            // Retorna uma resposta de sucesso
            return response()->json([
                'message' => 'Arquivo enviado com sucesso!',
                'path' => $path // Retorna o caminho do arquivo salvo
            ], 201);
        }

        // Retorna um erro se nenhum arquivo foi enviado
        return response()->json(['error' => 'Nenhum arquivo enviado.'], 400);
    }
}