@extends('plantilla')
@section('title')
CALIFICACIONES
 @endsection
 @section('fin')
<!DOCTYPE html>
<html>
<head>
	<link href="{{asset("css/estilo.css")}}" rel="stylesheet" >
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<title>Calificaciones</title>
</head>
<body>
<?php
 function calcularPromedio($n1,$n2,$n3,$n4){
      return  ($n1+$n2+$n3+$n4)/4;
    }
    function estado($n1,$n2,$n3,$n4){
    	$promedio= ($n1+$n2+$n3+$n4)/4;
    	if($promedio>=14){
    		return 'aprobado';
    	}else{
    		return 'desaprobado';
    	}
    }
?>
@if(Session::has('Mensaje')){{
Session::get('Mensaje')
}}
@endif
<a href="{{url('calificaciones/crear')}}" class="btn btn-info">Agregar Calificaciones</a>
<a href="{{url('/')}}" class="btn btn-secondary">Regresar</a>
<br>
<br>
<table class="table table-light">
	<thead class="thead-light">
		<tr>
			<th scope="col">#</th>
			<th scope="col">Nombre del Curso</th>
			<th scope="col">Alumno</th>
			<th scope="col">Nota1</th>
			<th scope="col">Nota2</th>
			<th scope="col">Nota3</th>
			<th scope="col">Nota4</th>
			<th scope="col">Promedio</th>
			<th scope="col">Estado</th>
			<th scope="col">Acciones</th>
	</thead>
	<tbody>
		@foreach($calificaciones as $calificaciones)
		<tr>
			<td>{{$loop->iteration}}</td>
			<td>{{$calificaciones->NombreC}}</td>
			<td>{{$calificaciones->Nombre}}</td>
			<td>{{$calificaciones->Nota1}}</td>
			<td>{{$calificaciones->Nota2}}</td>
			<td>{{$calificaciones->Nota3}}</td>
			<td>{{$calificaciones->Nota4}}</td>
			<td>{{calcularPromedio($calificaciones->Nota1,$calificaciones->Nota2,$calificaciones->Nota3,$calificaciones->Nota4)}}</td>
			<td>
				{{estado($calificaciones->Nota1,$calificaciones->Nota2,$calificaciones->Nota3,$calificaciones->Nota4)}}</td>
			<td>

			<a href="{{url('/calificaciones/'.$calificaciones->id.'/editar')}}" class="btn btn-success">
				Editar
			</a><br>


				<form method="post" action="{{url('/calificaciones/'.$calificaciones->id)}}">
				{{csrf_field()}}
				{{method_field('DELETE')}}
				<button type="submit" class="btn btn-danger" onclick="return confirm('¿Estas seguro de borrar?');"  class="btn btn-danger">Borrar</button>
				</form>

			</td>
		</tr>
		@endforeach
	</tbody>
</table>
</body>
</html>
 @endsection