<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sobre OnlyPans - Aprende Más</title>
    <!-- SEO Meta Tags -->
    <meta name="description" content="Descubre cómo OnlyPans puede ayudarte a encontrar, compartir y disfrutar de recetas de cocina increíbles. Aprende nuevas técnicas y comparte tus creaciones culinarias.">
    <meta name="keywords" content="OnlyPans, recetas de cocina, compartir recetas, técnicas culinarias, creaciones culinarias">
    <meta name="robots" content="index, follow">
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Sobre OnlyPans - Aprende Más">
    <meta property="og:description" content="Descubre cómo OnlyPans puede ayudarte a encontrar, compartir y disfrutar de recetas de cocina increíbles. Aprende nuevas técnicas y comparte tus creaciones culinarias.">
    <meta property="og:image" content="{{ asset('imagenes/logo.png') }}">
    <meta property="og:url" content="{{ url('/about') }}">
    <meta property="og:type" content="website">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/HomePageCss.css') }}">
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f5f5f5;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .content-wrapper {
            background-color: #fff;
            border-radius: 12px;
            padding: 40px;
            margin: 40px auto;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            display: flex;
            flex-direction: column;
            gap: 40px;
        }
        .header-title {
            font-size: 3em;
            text-align: center;
            margin-bottom: 30px;
            color: #2c3e50;
        }
        .section-title {
            font-size: 1.75em;
            margin-top: 20px;
            color: #34495e;
            border-bottom: 2px solid #e74c3c;
            padding-bottom: 10px;
        }
        .section-content {
            font-size: 1.1em;
            line-height: 1.8;
            color: #7f8c8d;
            margin-bottom: 20px;
        }
        .section-content p {
            margin-bottom: 15px;
        }
        ul.section-content {
            padding-left: 20px;
        }
        ul.section-content li {
            margin-bottom: 10px;
        }
        footer {
            background-color: #34495e;
            color: #ecf0f1;
            padding: 20px 0;
            text-align: center;
        }
        footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h1 class="header-title">Sobre OnlyPans</h1>
        </x-slot>

        <div class="content-wrapper">
            <section>
                <h2 class="section-title">¿Qué es OnlyPans?</h2>
                <div class="section-content">
                    <p>OnlyPans es la mejor plataforma para encontrar, compartir y disfrutar de recetas de cocina increíbles.</p>
                    <p>Aquí puedes explorar una variedad de recetas, aprender nuevas técnicas y compartir tus propias creaciones culinarias.</p>
                </div>
            </section>
            <section>
                <h2 class="section-title">Cómo Funciona</h2>
                <div class="section-content">
                    <p>Para comenzar, simplemente regístrate y accede a tu cuenta.</p>
                    <p>Puedes buscar recetas utilizando la barra de búsqueda o explorar las categorías.</p>
                    <p>Una vez que encuentres una receta que te guste, puedes guardarla, compartirla o incluso modificarla para adaptarla a tus gustos.</p>
                </div>
            </section>
            <section>
                <h2 class="section-title">Beneficios de Usar OnlyPans</h2>
                <ul class="section-content">
                    <li>Acceso a una amplia variedad de recetas.</li>
                    <li>Oportunidad de aprender nuevas técnicas culinarias.</li>
                    <li>Posibilidad de compartir tus propias recetas y recibir feedback.</li>
                    <li>Conectar con otros entusiastas de la cocina.</li>
                </ul>
            </section>
            <section>
                <h2 class="section-title">Únete a Nuestra Comunidad</h2>
                <div class="section-content">
                    <p>No esperes más, únete a OnlyPans y comienza tu aventura culinaria.</p>
                    <p>Ya sea que estés buscando inspiración o quieras compartir tus conocimientos, OnlyPans es el lugar perfecto para ti.</p>
                </div>
            </section>
        </div>

        <footer>
            <p>OnlyPans derechos reservados &#169; {{ date('Y') }}</p>
        </footer>
    </x-app-layout>
</body>
</html>
