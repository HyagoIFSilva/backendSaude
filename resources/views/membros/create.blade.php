@extends('layouts.app')

@section('content')
<h1>Adicionar Membro</h1>
<form action="{{ route('membros.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Nome:</label>
    <input type="text" name="nome" required><br><br>

    <label>Usuário Instagram:</label>
    <input type="text" name="usuario_instagram"><br><br>

    <label>Imagem:</label>
    <input type="file" name="imagem"><br><br>

    <button type="submit">Salvar</button>
</form>
@endsection
