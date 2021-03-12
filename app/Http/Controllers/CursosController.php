<?php

namespace App\Http\Controllers;

use App\Cursos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['cursos']=Cursos::paginate(5);
        return view('cursos.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cursos.create');
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
         $datosCurso=request()->except('_token');
        Cursos::insert($datosCurso);
        //return response()->json($datosProfesor);
        return redirect('cursos')->with('Mensaje','Curso agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function show(Cursos $cursos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cursos=Cursos::findOrFail($id);
        return view('cursos.edit',compact('cursos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosCurso=request()->except(['_token','_method']);
        Cursos::where('id','=',$id)->update($datosCurso);

        //$profesor=Profesor::findOrFail($id);
        //return view('profesor.edit',compact('profesor'));
         return redirect('cursos')->with('Mensaje','Curso modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cursos  $cursos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $cursos=Cursos::findOrFail($id);
        //return redirect('profesor');
        Cursos::destroy($id);
        return redirect('cursos')->with('Mensaje','Curso eliminado');
    }
    }
