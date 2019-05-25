<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::resource('docente/index','GrupoMateriaController');
Route::resource('docente/index','DocenteMateriaController');

Route::get('docente/crearGrupo','GrupoLaboratorioController@create');
Route::resource('docente/grupoLaboratorio','GrupoLaboratorioController');
Route::resource('docente/grupoLaboratorio/listaEstudiantes','ListaController');
Route::resource('docente/auxiliar','AuxiliarController');
//

Route::resource('administrador/docente', 'DocenteController');
Route::resource('administrador/materia', 'MateriaController');
Route::resource('administrador/auxiliar', 'AuxiliarController');
Route::resource('administrador/gestion', 'GestionController');
Route::resource('estudiante', 'EstudianteController');

Route::get('inscripcion/sesionMateria/{idGrupo}/{idEstudiante}','SesionMateriaController@listarSesiones');
Route::get('inscripcion/sesionMateria/practicaAuxiliar/{idg}/{idEstudiante}/{idins}/{idprac}','SesionMateriaController@buscarPractica');
Route::get('inscripcion/sesionMateria/portafolio/{idg}/{idEstudiante}/{idins}/{idprac}','SesionMateriaController@buscarPortafolio');
Route::resource('inscripcion/sesionMateria', 'SesionMateriaController');

Route::get('inscripcion/listarMaterias','InscripcionController@listarMaterias');
Route::get('inscripcion/{id}','InscripcionController@listarDocentesDeLaMateria');
Route::get('inscripcion/{id}/{id2}','InscripcionController@buscarGrupos');
Route::resource('inscripcion', 'InscripcionController');

// Route::resource('docente/index','GrupoMateriaController');
Route::resource('docente/index','DocenteMateriaController');
// 
// Route::resource('docente/grupos/{id}/{id2}','GrupoLaboratorioController@listarGrupos');
// Route::resource('docente/grupoLaboratorio/{id}','GrupoLaboratorioController@show');

Route::get('docente/crearGrupo','GrupoLaboratorioController@create');
Route::resource('docente/grupoLaboratorio','GrupoLaboratorioController');

Route::resource('docente/grupoLaboratorio/listaEstudiantes','ListaController');
//

//
Route::resource('docente/auxiliar','AuxiliarController');
//
Route::resource('auxiliar','Auxiliar\AuxiliarController1');
Route::resource('auxiliar/grupo2','Auxiliar\AuxiliarController2');
