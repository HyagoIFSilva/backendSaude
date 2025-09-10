<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use Illuminate\Http\Request;

class FilmeController extends Controller
{
    public function index()
    {
        $filmes = \App\Models\Filme::all();
        return view('home', compact('filmes'));
    }

    public function indexApi()
    {
        
        $filmes = \App\Models\Filme::all();
        return $filmes;
    }

    public function storeApi(Request $request){

    $filme = new Filme();
    
    $filme -> titulo =  $request->titulo;
    $filme -> genero = $request->genero;
    $filme -> imagem = $request->imagem;
    $filme -> classificacao = $request->classificacao;
    $filme -> created_at =date('Y-m-d H:i:s');
    $filme -> update_at =date('Y-m-d H:i:s');

    $filme -> save();
    }
}
