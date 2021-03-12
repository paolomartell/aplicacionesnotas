@extends('plantilla')
@section('title')
 PROFESOR
 @endsection
 @section('fin')
<!DOCTYPE html>
<html>
<link href="{{asset("estilo.css")}}" rel="stylesheet" >
<head>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<title>Profesor</title>
</head>
<body>

@if(Session::has('Mensaje')){{
Session::get('Mensaje')
}}
@endif
<div >
<a href="{{url('profesor/crear')}}" class="btn btn-info">Agregar Profesores</a>
<a href="{{url('/')}}" class="btn btn-secondary">Regresar</a>
</div>
<br>
<br>
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
		@foreach($profesor as $profesor)
		<tr>
			<td>{{$loop->iteration}}</td>
			<td>
				<img src="{{asset ('storage').'/'.$profesor->foto}}" alt="" width="200">
			</td>
			<td>{{$profesor->Nombre}}</td>
			<td>{{$profesor->ApellidoPaterno}}</td>
			<td>{{$profesor->ApellidoMaterno}}</td>
			<td>{{$profesor->Correo}}</td>
			<td>
			<a href="{{url('/profesor/'.$profesor->id.'/editar')}}" class="btn btn-success">
				Editar
			</a>
				<form method="post" action="{{url('/profesor/'.$profesor->id)}}">
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