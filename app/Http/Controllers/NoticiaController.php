<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;
use Carbon\Carbon;

class NoticiaController extends Controller
{
    public function index()
    {
        $noticias = Noticia::where('fecha_publicacion', '>=', Carbon::now()->subMonth())
                            ->orderBy('fecha_publicacion', 'desc')
                            ->get();
        return view('welcome', compact('noticias'));
    }
}
