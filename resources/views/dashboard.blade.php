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
    <style>
        .receta {
            background-color: rgba(255, 255, 255, 0.9); /* Fondo blanco con transparencia */
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            overflow: hidden;
        }

        .receta-content {
            opacity: 0;
            max-height: 0;
            transition: max-height 0.5s ease-in-out, opacity 0.5s ease-in-out;
        }

        .receta.expanded .receta-content {
            opacity: 1;
            max-height: 1000px; /* Altura suficiente para mostrar el contenido */
        }

        .toggle-btn {
            display: block;
            margin: 10px auto;
            background-color: #ff5722;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            text-align: center;
        }

        .toggle-btn:hover {
            background-color: #e64a19;
        }
        
        .filter button img {
            width: 20px; /* Ajusta el tamaño según tus necesidades */
            height: 20px; /* Ajusta el tamaño según tus necesidades */
            vertical-align: middle;
        }

        .pagination-links {
            background-color: black;
        }
    </style>
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h1 class="font-semibold text-2xl text-gray-800 leading-tight">Recetas de Cocina</h1>
        </x-slot>

        <div class="content-wrapper">
            <div class="sidebar left">
                <div class="advertisement">
                    <p>Publicidad</p>
                    <button>ENTRAR</button>
                </div>
            </div>
            <div class="main-content">
                <div class="filter">
                    <form method="GET" action="{{ route('dashboard') }}">
                        <input type="text" id="filter-input" name="search" placeholder="Busqueda" value="{{ request('search') }}">
                        <button type="submit"><img src="./Imagenes/lupa_temática_cocina.png" alt="Lupa de busqueda"></button>
                    </form>
                </div>
                <div class="recipes-grid">
                    @if($recetas->isEmpty())
                        <p>No hay recetas disponibles.</p>
                    @else
                        @foreach ($recetas as $receta)
                            <div class="receta">
                                <h2 class="receta-titulo">{{ $receta->titulo }}</h2>
                                <p>{{ $receta->descripcion }}</p>
                                <div class="receta-content">
                                    <h4>Ingredientes</h4>
                                    <p>{{ $receta->ingredientes }}</p>
                                    <h4>Instrucciones</h4>
                                    <p>{{ $receta->instrucciones }}</p>
                                </div>
                                <button class="toggle-btn" onclick="toggleReceta(this)">Mostrar más</button>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="pagination-links">
                    {{ $recetas->appends(request()->input())->links() }}
                </div>
            </div>
            <div class="sidebar right">
                <div class="advertisement">
                    <p>Publicidad</p>
                    <button>ENTRAR</button>
                </div>
            </div>
        </div>
        <footer>
            <p>OnlyPans derechos reservados &#169</p>
        </footer>
    </x-app-layout>

    <script>
        function toggleReceta(btn) {
            const receta = btn.closest('.receta');
            const content = receta.querySelector('.receta-content');
            receta.classList.toggle('expanded');
            if (receta.classList.contains('expanded')) {
                btn.textContent = 'Mostrar menos';
                content.style.maxHeight = content.scrollHeight + 'px';
                content.style.opacity = '1';
            } else {
                btn.textContent = 'Mostrar más';
                content.style.maxHeight = '0';
                content.style.opacity = '0';
            }
        }
    </script>
</body>
</html>
