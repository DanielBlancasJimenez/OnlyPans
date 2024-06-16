<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OnlyPans</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/HomePageCss.css') }}">
</head>
<body class="font-sans antialiased">
    <header>
        <div class="logo">
            <img src="{{ asset('imagenes/logo.png') }}" alt="Only Pans Logo">
        </div>
        <nav>
            <a href="/">Inicio</a>
            <a href="/dashboard">Recetas</a>
            <a href="/mis-recetas">Mis recetas</a>
        </nav>
        <div class="avatar">
            @if (Route::has('login'))
                <div class="flex justify-end">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                            Inicio de sesion
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                            Log in
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                                Register
                            </a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </header>
    <main>
        <section class="introduction">
            <h1>Bienvenido a OnlyPans</h1>
            <p>OnlyPans es la mejor plataforma para encontrar, compartir y disfrutar de recetas de cocina increíbles. Aquí puedes explorar una variedad de recetas, aprender nuevas técnicas y compartir tus propias creaciones culinarias.</p>
        </section>
        <section class="news">
            <h2>Noticias sobre Cocina</h2>
            @foreach($noticias as $noticia)
                <article class="news-item">
                    <h3>{{ $noticia->titulo }}</h3>
                    <p>{{ $noticia->descripcion }}</p>
                    <p><small>{{ $noticia->fecha_publicacion->format('d M Y') }}</small></p>
                </article>
            @endforeach
        </section>
    </main>
    <footer>
        <p>OnlyPans derechos reservados &#169; {{ date('Y') }}</p>
    </footer>
</body>
</html>
