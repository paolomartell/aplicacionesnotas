<!DOCTYPE html>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<title>Crear Cursos</title>
</head>
<body>

<form action="{{url('/cursos')}}" method="post" enctype="multipart/form-data">
{{ csrf_field()}}
@include('cursos.forms',['Modo'=>'crear'])

</form>
</body>
</html>