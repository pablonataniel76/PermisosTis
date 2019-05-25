<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comentario;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\PortafolioFormRequest;
use DB;

class SesionMateriaController extends Controller
{
    public function __construct(){
    }

    public function listarSesiones($idGrupo, $idEstudiante){
        $sesiones=DB::table('inscripcion as ins')
        ->join('practica_grupo as pg','pg.ID_GRUPOLAB','=','ins.ID_GRUPOLAB')
        ->join('grupo_laboratorio as gl','gl.ID_GRUPOLAB','=','ins.ID_GRUPOLAB')
        ->where('ESTADO_GC','=','1')
        ->where('pg.ID_GRUPOLAB','=',$idGrupo)
        ->where('ID_ESTUDIANTE','=', $idEstudiante);
        $sesiones = $sesiones->get();
        return view('inscripcion.sesionMateria.principal',["sesiones"=>$sesiones]);
        
    }
    public function buscarPortafolio($idGrupo, $idEstudiante,$idIns, $idPrac){
        $sesiones=DB::table('inscripcion as ins')
        ->join('practica_grupo as pg','pg.ID_GRUPOLAB','=','ins.ID_GRUPOLAB')
        ->join('grupo_laboratorio as gl','gl.ID_GRUPOLAB','=','ins.ID_GRUPOLAB')
        ->where('ESTADO_GC','=','1')
        ->where('pg.ID_GRUPOLAB','=',$idGrupo)
        ->where('ID_ESTUDIANTE','=', $idEstudiante);
        $sesiones = $sesiones->get();
        $portafolio = DB::table('portafolio')
        ->where('ID_INSCRIPCION','=',$idIns)
        ->where('ID_PRAC_GRUPO','=',$idPrac)
        ->select('ID_PORTAFOLIO');
        $portafolio = $portafolio->get()->first();
        if(count($portafolio)==0){
            $por=new Comentario;
            $por->ID_INSCRIPCION=$idIns;
            $por->ID_PRAC_GRUPO=$idPrac;
            $por->COMENTARIO_AUXILIAR=""; 
            $por->save();
        }
        $portafolio1 = DB::table('portafolio as p')
        ->join('portafolio_multiple as pm','pm.ID_PORTAFOLIO','=','p.ID_PORTAFOLIO')
        ->where('ID_INSCRIPCION','=',$idIns)
        ->where('ID_PRAC_GRUPO','=',$idPrac);
        $portafolio1 = $portafolio1->get();
        return view('inscripcion.sesionMateria.portafolio',[
            "sesiones"=>$sesiones,
            "portafolio1"=>$portafolio1,
            "idpor"=>$portafolio->ID_PORTAFOLIO]);
    }
    public function buscarPractica($idGrupo, $idEstudiante,$idIns, $idPrac){
        $sesiones=DB::table('inscripcion as ins')
        ->join('practica_grupo as pg','pg.ID_GRUPOLAB','=','ins.ID_GRUPOLAB')
        ->join('grupo_laboratorio as gl','gl.ID_GRUPOLAB','=','ins.ID_GRUPOLAB')
        ->where('ESTADO_GC','=','1')
        ->where('pg.ID_GRUPOLAB','=',$idGrupo)
        ->where('ID_ESTUDIANTE','=', $idEstudiante);
        $sesiones = $sesiones->get();
        $sesion=DB::table('inscripcion as ins')
        ->join('practica_grupo as pg','pg.ID_GRUPOLAB','=','ins.ID_GRUPOLAB')
        ->join('grupo_laboratorio as gl','gl.ID_GRUPOLAB','=','ins.ID_GRUPOLAB')
        ->where('ESTADO_GC','=','1')
        ->where('pg.ID_GRUPOLAB','=',$idGrupo)
        ->where('ID_ESTUDIANTE','=', $idEstudiante)
        ->where('ID_PRAC_GRUPO','=',$idPrac);
        $sesion = $sesion->get()->first();
        $portafolio1 = DB::table('portafolio as p')
        ->join('portafolio_multiple as pm','pm.ID_PORTAFOLIO','=','p.ID_PORTAFOLIO')
        ->where('ID_INSCRIPCION','=',$idIns)
        ->where('ID_PRAC_GRUPO','=',$idPrac);
        $portafolio1 = $portafolio1->get();
        return view('inscripcion.sesionMateria.practicaAuxiliar',[
            "sesiones"=>$sesiones,
            "portafolio1"=>$portafolio1,
            "practica"=>$sesion->PRACTICA]);
    }
    public function create(){
        return view('inscripcion.sesionMateria');
    }
    public function store(PortafolioFormRequest $request ){
        return $request->all();
        $port = new Portafolio;
        $port->ID_PORTAFOLIO = $request->get('ID_PORTAFOLIO');
        $ruta_id = public_path().'/prueba/';
        if(Input::hasFile('file')){
            $file = Input::file('file');
            $file->move($ruta_id,$file->getClientOriginalName());
            $port->RUTA_ARCHIVO = $file->getClientOriginalName();
        }
        $port->save();
        return redirect($request->ruta);
    }
}
