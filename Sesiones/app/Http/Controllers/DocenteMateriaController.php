<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use NuevoProyecto\DocenteMateria;
use NuevoProyecto\Http\Requests\DocenteMateriaFormRequest;
use DB;

class DocenteMateriaController extends Controller
{
   public function __construct(){

    }
    public function index(){
    
        $materias = DB::table('docente_materia as dm')
        ->join('docente as d','d.ID_DOCENTE','=','dm.ID_DOCENTE')
        ->join('materia as m','m.ID_MATERIA','=','dm.ID_MATERIA')
        ->where('d.ESTADO','=','1')
        ->where('dm.ID_DOCENTE','=','1001');
        $materias = $materias->get();
        return view('docente.index',["materias"=>$materias]);
      
        


    }    
}
