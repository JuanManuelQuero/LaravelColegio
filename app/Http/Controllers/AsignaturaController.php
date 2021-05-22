<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use App\Models\Profesor;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asignatura = Asignatura::orderBy('nombre')->paginate(5);
        return view('asignaturas.index', compact('asignatura'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $misProfesores = Profesor::getId();
        return view('asignaturas.create', compact('misProfesores'));
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
            'nombre' => ['required', 'string', 'min:3' ,'max:30'],
            'descripcion' => ['required', 'string', 'min:5', 'max:90'],
            'creditos' => ['required', 'integer'],
            'profesor_id' => ['required']
        ]);

        try {
            Asignatura::create($request->all());
            return redirect()->route('asignaturas.index')->with('mensaje', 'Asignatura creada correctamente');
        }catch(\Exception $ex) {
            return redirect()->route('asignaturas.index')->with('mensaje', 'Error: ' .$ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function show(Asignatura $asignatura)
    {
        return view('asignaturas.show', compact('asignatura'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function edit(Asignatura $asignatura)
    {
        $misProfesores = Profesor::getId();
        return view('asignaturas.edit', compact('asignatura', 'misProfesores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asignatura $asignatura)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'min:3' ,'max:30'],
            'descripcion' => ['required', 'string', 'min:5', 'max:90'],
            'creditos' => ['required', 'integer'],
            'profesor_id' => ['required']
        ]);

        try {
            $asignatura->update($request->all());
            return redirect()->route('asignaturas.index')->with('mensaje', 'Asignatura actualizada correctamente');
        }catch(\Exception $ex) {
            return redirect()->route('asignaturas.index')->with('mensaje', 'Error: ' .$ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asignatura $asignatura)
    {
        try {
            $asignatura->delete();
            return redirect()->route('asignaturas.index')->with("mensaje", "Asignatura borrado correctamente");
        } catch (\Exception $ex) {
            return redirect()->route('asignaturas.index')->with("mensaje", "Error:" . $ex->getMessage());
        }
    }
}
