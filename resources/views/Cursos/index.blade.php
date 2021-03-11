@extends('plantilla')
@section('title')
CURSOS
 @endsection
 @section('fin')
<!DOCTYPE html>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<title>Cursos</title>
</head>
<body>


@if(Session::has('Mensaje')){{
Session::get('Mensaje')
}}
@endif
<a href="{{url('cursos/crear')}}" class="btn btn-info">Agregar Curso</a>
<a href="{{url('/')}}" class="btn btn-secondary">Regresar</a>
<br>
<br>
<table class="table table-light">
	<thead class="thead-light">
		<tr>
			<th scope="col">#</th>
			<th scope="col">Nombre</th>
			<th scope="col">Horario Inicio</th>
			<th scope="col">Horario Fin</th>
			<th scope="col">Acciones</th>
	</thead>
	<tbody>
		@foreach($cursos as $cursos)
		<tr>
			<td>{{$loop->iteration}}</td>
			<td>{{$cursos->NombreC}}</td>
			<td>{{$cursos->horarioInicio}}</td>
			<td>{{$cursos->horarioFin}}</td>
			<td>
			<a href="{{url('/cursos/'.$cursos->id.'/editar')}}" class="btn btn-success">
				Editar
			</a>



				<form method="post" action="{{url('/cursos/'.$cursos->id)}}">
				{{csrf_field()}}
				{{method_field('DELETE')}}
				<button type="submit" onclick="return confirm('¿Estas seguro de borrar?');"class="btn btn-danger" >Borrar</button>
				</form>

			</td>
		</tr>
		@endforeach
	</tbody>
</table>
</body>
</html>
 @endsection