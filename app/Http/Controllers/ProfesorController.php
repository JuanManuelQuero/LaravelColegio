<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profesor = Profesor::orderBy('apellidos')->paginate(5);
        return view('profesores.index', compact('profesor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profesores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'min:3', 'max:30'],
            'apellidos' => ['required', 'string', 'min:5', 'max:50'],
            'email' => ['required', 'string', 'min:3', 'max:50', 'unique:profesors,email'],
            'localidad' => ['required', 'string', 'min:5', 'max:90']
        ]);

        try {
            Profesor::create($request->all());
            return redirect()->route('profesores.index')->with('mensaje', 'Profesor añadido correctamente');
        }catch(\Exception $ex) {
            return redirect()->route('profesores.index')->with('mensaje', 'Error: '.$ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function show(Profesor $profesore)
    {
        return view('profesores.show', compact('profesore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function edit(Profesor $profesore)
    {
        return view('profesores.edit', compact('profesore'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profesor $profesore)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'min:3', 'max:30'],
            'apellidos' => ['required', 'string', 'min:5', 'max:50'],
            'email' => ['required', 'string', 'min:3', 'max:50', 'unique:profesors,email'.$profesore->id],
            'localidad' => ['required', 'string', 'min:5', 'max:90']
        ]);

        try {
            $profesore->update($request->all());
            return redirect()->route('profesores.index')->with('mensaje', 'Profesor actualizado correctamente');
        }catch(\Exception $ex) {
            return redirect()->route('profesores.index')->with('mensaje', 'Error: '.$ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profesor $profesore)
    {
        try {
            $profesore->delete();
            return redirect()->route('profesores.index')->with("mensaje", "Profesor borrado correctamente");
        } catch (\Exception $ex) {
            return redirect()->route('profesores.index')->with("mensaje", "Error:" . $ex->getMessage());
        }
    }
}
