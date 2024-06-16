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
<x-app-layout>
<body class="font-sans antialiased">
<x-slot name="header">
            <h1 class="font-semibold text-2xl text-gray-800 leading-tight">Bienvenido a nuestra seccion de noticias


            </h1>
            <p>OnlyPans es la mejor plataforma para encontrar, compartir y disfrutar de recetas de cocina increíbles. Aquí puedes explorar una variedad de recetas, aprender nuevas técnicas y compartir tus propias creaciones culinarias.</p>
        </x-slot>
    <main>
       
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
</x-app-layout>
</html>
