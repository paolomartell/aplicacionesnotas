<?php
Route::get('/',function(){
return view('index');
});
//Route::view('/inicio','inicio');
Route::view('/contactos','contactos');
Route::resource('profesor','ProfesorController');
Route::resource('alumnos','AlumnosController');
Route::resource('cursos','CursosController');
Route::resource('calificaciones','CalificacionesController');

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
