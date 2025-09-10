@extends('template')

@section('content')
<main>
    <div class="descricao">
        <h1>SUA PRÓXIMA <br>SESSÃO</h1>
        <p>COMEÇA AQUI</p>
    </div>

    <section class="movies">
        <div class="container-cards">
            @foreach ($filmes as $filme)
            <div class="card-movie">
                <div class="poster">
                    <img src="{{ asset('img/'.$filme->imagem) }}" alt="{{ $filme->titulo }}">
                    <span class="classificacao _{{ strtolower($filme->classificacao) }}">
                        {{ $filme->classificacao }}
                    </span>
                </div>
                <div class="info">
                    <h3>{{ $filme->titulo }}</h3>
                    <p>{{ $filme->genero }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </section>

</main>
@endsection