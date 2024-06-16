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
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Receta') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('recipes.update', $receta) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div>
                        <x-label for="titulo" :value="__('Título')" />
                        <x-input id="titulo" class="block mt-1 w-full" type="text" name="titulo" :value="$receta->titulo" required autofocus />
                    </div>

                    <div class="mt-4">
                        <x-label for="descripcion" :value="__('Descripción')" />
                        <textarea id="descripcion" class="block mt-1 w-full" name="descripcion" required>{{ $receta->descripcion }}</textarea>
                    </div>

                    <div class="mt-4">
                        <x-label for="ingredientes" :value="__('Ingredientes')" />
                        <textarea id="ingredientes" class="block mt-1 w-full" name="ingredientes" required>{{ $receta->ingredientes }}</textarea>
                    </div>

                    <div class="mt-4">
                        <x-label for="instrucciones" :value="__('Instrucciones')" />
                        <textarea id="instrucciones" class="block mt-1 w-full" name="instrucciones" required>{{ $receta->instrucciones }}</textarea>
                    </div>

                    <div class="mt-4">
                        <x-button>
                            {{ __('Guardar') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
