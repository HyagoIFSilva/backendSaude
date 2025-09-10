<?php

namespace App\Http\Controllers;

use App\Models\Membro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MembroController extends Controller
{
    public function index()
    {
        $membros = Membro::all();
        return view('sobre', compact('membros'));
    }

    public function create()
    {
        return view('membros.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'usuario_instagram' => 'nullable|string|max:255',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        if ($request->hasFile('imagem')) {
            $data['imagem'] = $request->file('imagem')->store('membros', 'public');
        }

        Membro::create($data);

        return redirect()->route('sobre')->with('success', 'Membro adicionado com sucesso!');
    }

    public function edit(Membro $membro)
    {
        return view('membros.edit', compact('membro'));
    }

    public function update(Request $request, Membro $membro)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'usuario_instagram' => 'nullable|string|max:255',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        if ($request->hasFile('imagem')) {
            if ($membro->imagem) {
                Storage::delete('public/' . $membro->imagem);
            }
            $data['imagem'] = $request->file('imagem')->store('membros', 'public');
        }

        $membro->update($data);

        return redirect()->route('sobre')->with('success', 'Membro atualizado com sucesso!');
    }

    public function destroy(Membro $membro)
    {
        if ($membro->imagem) {
            Storage::delete('public/' . $membro->imagem);
        }

        $membro->delete();
        return redirect()->route('sobre')->with('success', 'Membro excluído com sucesso!');
    }
}
