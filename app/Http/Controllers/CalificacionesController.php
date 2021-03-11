<?php

namespace App\Http\Controllers;

use App\Calificaciones;
use Illuminate\Http\Request;
use DB;

class CalificacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calificaciones = DB::table('calificaciones')
            ->join('cursos', 'calificaciones.idCurso', '=', 'cursos.id')
            ->join('alumnos', 'calificaciones.idAlumno', '=', 'alumnos.id')
            ->select('calificaciones.*', 'cursos.NombreC','alumnos.Nombre')
            ->get();
        return view("calificaciones.index",compact('calificaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('calificaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  public function store(Request $request)
    {
        //
         $datosCalificaciones=request()->except('_token');
        Calificaciones::insert($datosCalificaciones);
        //return response()->json($datosProfesor);
        return redirect('calificaciones')->with('Mensaje','Calificacion agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Calificaciones  $calificaciones
     * @return \Illuminate\Http\Response
     */
    public function show(Calificaciones $calificaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Calificaciones  $calificaciones
     * @return \Illuminate\Http\Response
     */
   public function edit($id)
    {
        //
        $calificaciones=Calificaciones::findOrFail($id);
        return view('calificaciones.edit',compact('calificaciones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Calificaciones  $calificaciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosCalificaciones=request()->except(['_token','_method']);
        Calificaciones::where('id','=',$id)->update($datosCalificaciones);

        //$profesor=Profesor::findOrFail($id);
        //return view('profesor.edit',compact('profesor'));
         return redirect('calificaciones')->with('Mensaje','Calificacion modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Calificaciones  $calificaciones
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $calificaciones=Calificaciones::findOrFail($id);
        //return redirect('profesor');
        Calificaciones::destroy($id);
        return redirect('calificaciones')->with('Mensaje','Calificaciones eliminado');
    }
}
