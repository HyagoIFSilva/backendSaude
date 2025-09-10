<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contatos =Contato::all();
        return view('contato', compact('contatos'));
    }

    public function indexApi()
    {

        $contatos =Contato::all();
        return $contatos;
    }

    public function storeApi(Request $request){

    $contato = new Contato();

    $contato -> nome =  $request->nome;
    $contato -> email = $request->email;
    $contato -> mensagem = $request->mensagem;
    $contato -> created_at =date('Y-m-d H:i:s');
    $contato -> updated_at =date('Y-m-d H:i:s');

    $contato -> save();
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'nome'     => ['required','string','max:255'],
        'email'    => ['required','email','max:255'],
        'mensagem' => ['required','string','max:5000'],
    ]);

    \App\Models\Contato::create($data);

    return redirect()
        ->route('contatos.index')
        ->with('success', 'Contato enviado com sucesso!');
}

}