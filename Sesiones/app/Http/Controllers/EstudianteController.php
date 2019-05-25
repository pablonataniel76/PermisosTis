<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estudiante;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\EstudianteFormRequest;
use DB;

class EstudianteController extends Controller
{
    public function __contruct(){

    }

    public function index(){
        return view("estudiante.index");
    }
    public function create(){
        return view("estudiante.create");
    }
    public function store(EstudianteFormRequest $request ){
        $estudiante = new Estudiante;
        $estudiante->NOMBRE_ESTUDIANTE = $request->get('NOMBRE_ESTUDIANTE');
        $estudiante->APELLIDO_ESTUDIANTE = $request->get('APELLIDO_ESTUDIANTE');
        $estudiante->CODIGO_SIS = $request->get('CODIGO_SIS');
        $estudiante->EMAIL = $request->get('EMAIL');
        $estudiante->CONTRASENIA = $request->get('CONTRASENIA');
        $estudiante->ESTADO ='1';
        $estudiante->save();
        return Redirect::to('estudiante');

    }
}
