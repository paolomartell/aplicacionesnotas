<?php
Route::get('/',function(){
return view('index');
});
//Route::view('/inicio','inicio');
Route::view('/contactos','contactos');
Route::resource('profesor','App\Http\Controllers\ProfesorController');
Route::resource('alumnos','App\Http\Controllers\AlumnosController');
//Route::resource('alumnos','AlumnosController');
Route::resource('cursos','App\Http\Controllers\CursosController');
Route::resource('calificaciones','App\Http\Controllers\ProfesorController');


//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
