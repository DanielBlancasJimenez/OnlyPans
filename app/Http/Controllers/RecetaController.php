<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use Illuminate\Http\Request;

class RecetaController extends Controller
{
    public function index(Request $request)
    {
        $query = Receta::query();
    
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('titulo', 'like', '%' . $search . '%');
        }
    
        $recetas = $query->paginate(4);
        return view('dashboard', compact('recetas'));
    }
    
    

    public function misRecetas()
    {
        $recetas = auth()->user()->recetas; 
        return view('recipes.index', compact('recetas'));
    }

    public function create()
    {
        return view('recipes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'ingredientes' => 'required|string',
            'instrucciones' => 'required|string',
        ]);

        auth()->user()->recetas()->create($request->all()); 

        return redirect()->route('recipes.index')->with('success', 'Receta creada exitosamente.');
    }

    public function edit(Receta $receta)
    {
        return view('recipes.edit', compact('receta'));
    }

    public function update(Request $request, Receta $receta)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'ingredientes' => 'required|string',
            'instrucciones' => 'required|string',
        ]);

        $receta->update($request->all());

        return redirect()->route('recipes.index')->with('success', 'Receta actualizada exitosamente.');
    }

    public function destroy(Receta $receta)
    {
        $receta->delete();

        return redirect()->route('recipes.index')->with('success', 'Receta eliminada exitosamente.');
    }
}
