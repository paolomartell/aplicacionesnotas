<?php

namespace App\Http\Controllers;

use App\Alumnos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['alumnos']=Alumnos::paginate(5);
        return view('alumnos.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function create()
    {
        //
        return view('alumnos.create');
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

        $datosAlumnos=request()->except('_token');
        if($request->hasFile('Foto')){
            $datosAlumnos['Foto']=$request->file('Foto')->store('uploads','public');
        }
        Alumnos::insert($datosAlumnos);
        //return response()->json($datosProfesor);
        return redirect('alumnos')->with('Mensaje','Alumno agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function show(Alumnos $alumnos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $alumnos=Alumnos::findOrFail($id);
        return view('alumnos.edit',compact('alumnos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosAlumnos=request()->except(['_token','_method']);
        if($request->hasFile('Foto')){
            $alumnos=Alumnos::findOrFail($id);
            Storage::delete('public/'.$alumnos->foto);
            $datosAlumnos['Foto']=$request->file('Foto')->store('uploads','public');
        }
        Alumnos::where('id','=',$id)->update($datosAlumnos);

        //$profesor=Profesor::findOrFail($id);
        //return view('profesor.edit',compact('profesor'));
         return redirect('alumnos')->with('Mensaje','Alumno modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alumnos  $alumnos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alumnos=Alumnos::findOrFail($id);
        if(Storage::delete('public/'.$alumnos->foto)){
        Alumnos::destroy($id);
        }
        return redirect('alumnos')->with('Mensaje','Alumno eliminado');
    }
}
