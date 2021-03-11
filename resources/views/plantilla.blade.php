  <title>@yield('title')</title>
<link href="{{asset("css/estilo.css")}}" rel="stylesheet" >
            <header>

    <div class="contenedor">
        <img src="https://www.uns.edu.pe/vistas/ingenieria/img/edificio-sistemas.jpg">
        <nav>
            <ul>
            <li><a href='/'>INICIO</a></li>
            <li><a href='/profesor'>PROFESOR</a></li>
            <li><a href='/alumnos'>ALUMNO</a></li>
            <li><a href='/cursos'>CURSO</a></li>
            <li><a href='/calificaciones'>CALIFICACIONES</a></li>
            <li><a href='/contactos'>CONTACTENOS</a></li>
            </ul>
        </nav>
    </div>
</header>
 @yield('fin')
