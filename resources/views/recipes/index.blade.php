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
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Recetas</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<x-slot name="header">
    <div class="flex justify-between items-center">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">Mis Recetas</h1>
       
    </div>
    <a href="{{ route('recipes.create') }}" class="Create text-white px-4 py-2 rounded-md">Crear Receta</a>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="py-2">Título</th>
                        <th class="py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recetas as $receta) <!-- Asegúrate de usar $recetas -->
                        <tr>
                            <td class="py-2">{{ $receta->titulo }}</td>
                            <td class="py-2">
                                <a href="{{ route('recipes.edit', $receta) }}" class="text-blue-500">Editar</a>
                                <form action="{{ route('recipes.destroy', $receta) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
</x-app-layout>
