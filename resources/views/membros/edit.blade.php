@extends('layouts.app')

@section('content')
<h1>Editar Membro</h1>
<form action="{{ route('membros.update', $membro) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label>Nome:</label>
    <input type="text" name="nome" value="{{ $membro->nome }}" required><br><br>

    <label>Usuário Instagram:</label>
    <input type="text" name="usuario_instagram" value="{{ $membro->usuario_instagram }}"><br><br>

    <label>Imagem:</label>
    <input type="file" name="imagem"><br><br>
    @if($membro->imagem)
        <img src="{{ asset('storage/' . $membro->imagem) }}" width="100">
    @endif
    <br><br>

    <button type="submit">Atualizar</button>
</form>
@endsection
