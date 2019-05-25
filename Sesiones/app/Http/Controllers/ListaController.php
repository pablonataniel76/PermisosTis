<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use NuevoProyecto\Materia;
use NuevoProyecto\GrupoMateria;
use NuevoProyecto\GrupoLaboratorio;
use NuevoProyecto\Horario;
use NuevoProyecto\Http\Request\GrupoLaboratorioFormRequest;
use DB;

class ListaController extends Controller
{
     public function __construct()
    {

    }

    public function index(){
   		// $materias=DB::table('materia')->where('ESTADO','=','1');
     //     $materias = $materias->get();
    	return  view ('docente.GrupoLaboratorio.listaEstudiantes');

    }
   public function show($id){
		$estudiantes=DB::table('estudiante-laboratorio as estLab')
                    ->join('estudiante as e','estLab.ID_ESTUDIANTE','=','e.ID_ESTUDIANTE')
                    ->select('estLab.ID_GRUPOLAB','estLab.ID_ESTUDIANTE','e.CODIGO_SIS','e.NOMBRE_ESTUDIANTE','e.APELLIDO_ESTUDIANTE')
                    ->where('estLab.ID_GRUPOLAB','=',$id)
                    ->get();
        return view ("docente.grupoLaboratorio.listaEstudiantes",["estudiantes"=>$estudiantes]);
   }
}
