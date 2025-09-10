@extends('template')

@section('content')
<link rel="stylesheet" href="{{ asset('css/contato.css') }}">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

<div class="container">
  <h1>FALE CONOSCO</h1>
    {{-- Sucesso --}}
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  {{-- Erros de validação --}}
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul style="margin:0; padding-left:18px">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif


  <form method="POST" action="{{ route('contatos.store') }}">
    @csrf

    <label for="nome">Nome</label>
    <input type="text" id="nome" name="nome" value="{{ old('nome') }}"
      required />

    <label for="email">E-mail</label>
    <input type="email" id="email" name="email" value="{{ old('email') }}"
      required />

    <label for="mensagem">Mensagem</label>
    <textarea id="mensagem" name="mensagem" required>{{ old('mensagem') }}</textarea>

    <button type="submit" class="btn-enviar">ENVIAR</button>
  </form>
</div>
@endsection