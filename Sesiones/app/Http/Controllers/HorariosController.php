<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use NuevoProyecto\Horario;
use NuevoProyecto\Http\Request\HorarioFromRequest;
use DB;
class HorariosController extends Controller
{
    public function index(){
    	$horarios=DB::table('hora-clase');
        $horarios = $horarios->get();
      	return view ('docente/asignarHorario',["horarios"=>$horarios]);
    }
}
