<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeFlix</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
      <header>
        <div class="interface">
            <div class="logo">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('img/codeflix-white.png') }}" class="logo" alt="Logo Codeflix">
                </a>
            </div>

            <nav class="menu-desktop">
                <ul>
                    <li><a href="{{ url('/') }}">HOME</a></li>
                    <li><a href="#">EM CARTAZ</a></li>
                    <li><a href="{{ url('/contato') }}">CONTATO</a></li>
                    <li><a href="{{ url('/sobre') }}">QUEM SOMOS</a></li>
                </ul>
            </nav>

            <div class="btn-contato">
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">SAIR</button>
                    </form>
                @else
                    <a href="{{ route('login') }}">
                        <button>MINHA CONTA</button>
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>Todos os direitos reservados &copy;</p>
    </footer>
</body>
</html>
