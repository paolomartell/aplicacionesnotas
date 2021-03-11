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
	<title>Formularios de Calificaciones</title>
</head>
<body>


<div class="form-group">
<label for="idAlumno" class="control-label"> {{'idAlumno'}} </label>
	<input type="text" class="form-control{{ $errors->has('idAlumno')?'is-invalid':''}} "	 name="idAlumno" id="idAlumno"
	value="{{isset($calificaciones->idAlumno)?$calificaciones->idAlumno:old('idAlumno')}}">

{!! $errors->first('idAlumno','<div class="invalid-feedback">:message</div>')!!}
	</div>
	<div class="form-group">
<label for="idCurso" class="control-label"> {{'idCurso'}} </label>
	<input type="text" class="form-control{{ $errors->has('idCurso')?'is-invalid':''}} " name="idCurso" id="idCurso"
	value="{{isset($calificaciones->idCurso)?$calificaciones->idCurso:old('idCurso')}}">

{!! $errors->first('idCurso','<div class="invalid-feedback">:message</div>')!!}
	</div>
<label for="Nota1"> {{'Nota1'}} </label>

	<input type="number" name="Nota1" id="Nota1" min="1" max="20"
	value="{{isset($calificaciones->Nota1)?$calificaciones->Nota1:''}}" required="">
	<br>

	<label for="Nota2"> {{'Nota2'}} </label>
	<input type="number" name="Nota2" id="Nota2" min="1" max="20"
	value="{{isset($calificaciones->Nota2)?$calificaciones->Nota2:''}}" required="">
	<br>
	<label for="Nota3"> {{'Nota3'}} </label>
	<input type="number" name="Nota3" id="Nota3" min="1" max="20"
	value="{{isset($calificaciones->Nota3)?$calificaciones->Nota3:''}}"required="">
	<br>
	<label for="Nota4"> {{'Nota4'}} </label>
	<input type="number" name="Nota4" id="Nota4" min="1" max="20"
	value="{{isset($calificaciones->Nota4)?$calificaciones->Nota4:''}}"required="">
	<br>

	<input type="submit" value="{{$Modo=='crear'? 'Agregar':'Modificar'}}">
	<a href="{{url('calificaciones')}}">Regresar</a>
	</body>
</html>

</div>
</div>
</div>
</div>
</div>