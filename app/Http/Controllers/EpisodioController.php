<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Episodio;

class EpisodioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Obtener todos los registros de episodios
        $episodios = Episodio::all();
        //Se manda la informacion a la vista index
        return view('episodios.index', compact('episodios'));
    }

    /**
     * Retornar la vista del formulario
     */
    public function create()
    {
        return view('episodios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Esquema para enviar a la BD
        Episodio::create([
            'titulo' => $request->titulo,
            'serie' => $request->serie,
            'temporada' => $request->temporada,
            'numero_episodio' => $request->numero_episodio
        ]);
        //Redireccion a una ruta especifica
        return redirect()->route('episodios.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Consultar informacion
     */
    public function edit(Episodio $episodio)
    {
        //Retornar vista con los datos del episodio
        return view('episodios.edit', compact('episodio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Episodio $episodio)
    {
        //Realizar validaciones de los campos del formulario
        $request->validate([
            'titulo' => 'required',
            'serie' => 'required',
            'temporada' => 'required',
            'numero_episodio' => 'required'
        ]);

        //Realizar la actualizacion en la base de datos
        $episodio->update($request->all());

        return redirect()->route('episodios.index')
            ->with('success', 'Actualizacion con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Episodio $episodio)
    {
        //Eliminacion del registro
        $episodio->delete();

        //Redireccionar al usuario
        return redirect()->route('episodios.index')
            ->with('success', 'Episodio eliminado');
    }
}