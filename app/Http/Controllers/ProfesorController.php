<?php

namespace App\Http\Controllers;

use App\Profesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['profesor']=Profesor::paginate(5);
        return view('profesor.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('profesor.create');
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
        //$datosProfesor=request()->all();
        $campos=[
            'Nombre'=>'required|string|max:100',
            'ApellidoPaterno'=>'required|string|max:100',
            'ApellidoMaterno'=>'required|string|max:100',
            'Correo'=>'required|email',
            'Foto'=>'required|max:10000|mimes:jpeg,png,jpg'
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);


        $datosProfesor=request()->except('_token');
        if($request->hasFile('Foto')){
            $datosProfesor['Foto']=$request->file('Foto')->store('uploads','public');
        }
        Profesor::insert($datosProfesor);
        //return response()->json($datosProfesor);
        return redirect('profesor')->with('Mensaje','Profesor agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function show(Profesor $profesor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $profesor=Profesor::findOrFail($id);
        return view('profesor.edit',compact('profesor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosProfesor=request()->except(['_token','_method']);
        if($request->hasFile('Foto')){
            $profesor=Profesor::findOrFail($id);
            Storage::delete('public/'.$profesor->foto);
            $datosProfesor['Foto']=$request->file('Foto')->store('uploads','public');
        }
        Profesor::where('id','=',$id)->update($datosProfesor);

        //$profesor=Profesor::findOrFail($id);
        //return view('profesor.edit',compact('profesor'));
         return redirect('profesor')->with('Mensaje','Profesor modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $profesor=Profesor::findOrFail($id);
        if(Storage::delete('public/'.$profesor->foto)){
        Profesor::destroy($id);
        }
        //return redirect('profesor');
        return redirect('profesor')->with('Mensaje','Profesor eliminado');
    }
}
