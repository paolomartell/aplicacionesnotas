@extends('plantilla')
@section('title')
ALUMNOS
 @endsection
 @section('fin')
<!DOCTYPE html>
<html>
<head>
	<link href="{{asset("css/estilo.css")}}" rel="stylesheet" >
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<title>Alumnos</title>
</head>
<body>

@if(Session::has('Mensaje')){{
Session::get('Mensaje')
}}
@endif
<a href="{{url('alumnos/crear')}}" class="btn btn-info">Agregar Alumnos</a>
<a href="{{url('/')}}" class="btn btn-secondary">Regresar</a>
<table class="table table-light">
	<thead class="thead-light">
		<tr>
			<th scope="col">#</th>
			<th scope="col">Foto</th>
			<th scope="col">Nombre</th>
			<th scope="col">Apellido Paterno</th>
			<th scope="col">Apellido Materno</th>
			<th scope="col">Correo</th>
			<th scope="col">Acciones</th>
	</thead>
	<tbody>
		@foreach($alumnos as $alumnos)
		<tr>
			<td>{{$loop->iteration}}</td>
			<td>
				<img src="{{asset ('storage').'/'.$alumnos->foto}}" alt="" width="200">

			</td>
			<td>{{$alumnos->Nombre}}</td>
			<td>{{$alumnos->ApellidoPaterno}}</td>
			<td>{{$alumnos->ApellidoMaterno}}</td>
			<td>{{$alumnos->Correo}}</td>
			<td>
			<a href="{{url('/alumnos/'.$alumnos->id.'/editar')}}" class="btn btn-success">
				Editar
			</a>



				<form method="post" action="{{url('/alumnos/'.$alumnos->id)}}">
				{{csrf_field()}}
				{{method_field('DELETE')}}
				<button type="submit" onclick="return confirm('¿Estas seguro de borrar?');" class="btn btn-danger">Borrar</button>
				</form>

			</td>
		</tr>
		@endforeach

	</tbody>
</table>
</body>
</html>
 @endsection