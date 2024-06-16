<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class NoticiasTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('noticias')->insert([
            [
                'titulo' => 'Nueva receta de verano',
                'descripcion' => 'Descubre nuestra nueva receta de ensalada perfecta para el verano.',
                'fecha_publicacion' => Carbon::now()->subDays(10),
            ],
            [
                'titulo' => 'Consejos para cocinar con niños',
                'descripcion' => 'Aprende a hacer que la cocina sea divertida y segura para los niños.',
                'fecha_publicacion' => Carbon::now()->subDays(20),
            ],
            [
                'titulo' => 'Beneficios de cocinar en casa',
                'descripcion' => 'Explora los beneficios para la salud y el bienestar de cocinar tus propias comidas.',
                'fecha_publicacion' => Carbon::now()->subDays(30),
            ],
        ]);
    }
}
