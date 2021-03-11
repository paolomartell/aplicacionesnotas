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
	<title>Formularios de Alumnos</title>
</head>
<body>

<div>
<label for="Nombre"> {{'Nombre'}} </label>
	<input type="text" name="Nombre" id="Nombre"  class="form-control"
	value="{{isset($alumnos->Nombre)?$alumnos->Nombre:''}}" placeholder="Escribe Nombre" required pattern="[A-Za-z]+" >
	</div>

<div>
<label for="ApellidoPaterno"> {{'ApellidoPaterno'}} </label>
	<input type="text" name="ApellidoPaterno" id="ApellidoPaterno" placeholder="Escribe apellido Paterno" class="form-control"
	value="{{isset($alumnos->ApellidoPaterno)?$alumnos->ApellidoPaterno:''}}" required pattern="[A-Za-z]+" >
	</div>
<div>
<label for="ApellidoMaterno"> {{'ApellidoMaterno'}} </label>
	<input type="text" name="ApellidoMaterno" id="ApellidoMaterno" class="form-control"
	value="{{isset($alumnos->ApellidoMaterno)?$alumnos->ApellidoMaterno:''}}" placeholder="Escribe apellido Materno" required pattern="[A-Za-z]+" >
	</div>

<div >
	<label for="Correo" class="control-label">  {{'Correo'}} </label>
	<input type="email" name="Correo" id="Correo" class="form-control"
	value="{{isset($alumnos->Correo)?$alumnos->Correo:''}}" placeholder="Escribe correo" >
</div>

<div class="form-group">
	<label for="Foto"> {{'Foto'}} </label>

	@if(isset($alumnos->foto))
	<br>
	<img src="{{asset ('storage').'/'.$alumnos->foto}}" alt="" width="200">
	@endif

	<input class="form-control {{$errors->has('Foto')?'is-invalid':''}}"type="file" name="Foto" id="Foto" value="">
{!! $errors->first('Foto','<div class="invalid-feedback">:message</div>')!!}
</div>

	<input type="submit" value="{{$Modo=='crear'? 'Agregar':'Modificar'}}">
	<a href="{{url('alumnos')}}">Regresar</a>
	</body>
</html>
</div>
</div>
</div>
</div>
</div>