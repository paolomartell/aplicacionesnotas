<div class="container">
<div class="row justify-content-center">
<!--codigo para poner todo el contenido en medio de la pagina web -->
	<div class="col-md-6">
		 <div class="card">
                <div class="card-header">
<!DOCTYPE html>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<title>Formularios de cursos</title>
</head>
<body>

<label for="NombreC"> {{'Nombre'}} </label>
	<input type="text" name="NombreC" id="NombreC" class="form-control"
	value="{{isset($cursos->NombreC)?$cursos->NombreC:''}}" required >
	<br>

	<label for="horarioInicio"> {{'Horario Inicio'}} </label>
	<input type="time" name="horarioInicio" id="horarioInicio"
	value="{{isset($cursos->horarioInicio)?$cursos->horarioInicio:''}}" required="">
	<br>
	<label for="horarioFin"> {{'Horario Fin'}} </label>
	<input type="time" name="HorarioFin" id="HorarioFin"
	value="{{isset($cursos->horarioFin)?$cursos->horarioFin:''}}" required="">
	<br>

	<input type="submit" value="{{$Modo=='crear'? 'Agregar':'Modificar'}}">
	<a href="{{url('cursos')}}">Regresar</a>
	</body>
</html>
</div>
</div>
</div>
</div>
</div>