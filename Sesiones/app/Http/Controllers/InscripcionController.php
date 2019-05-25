<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GrupoClase;
use App\HoraClase;
use App\docenteMateria;
use App\Inscripcion;
use App\Docente;
use App\Materia;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\InscripcionFormRequest;
use DB;

class InscripcionController extends Controller{
    
    public function __construct(){
    }

    public function index(){
        $gruposInscrito=DB::table('inscripcion as ins')
        ->join('grupo_laboratorio as gc','gc.ID_GRUPOLAB','=','ins.ID_GRUPOLAB')
        ->join('docente_materia as dm','dm.ID_DOCENTE_MATERIA','=','gc.ID_DOC_MAT')
        ->join('docente as d','d.ID_DOCENTE','=','dm.ID_DOCENTE')
        ->join('materia as m','m.ID_MATERIA','=','dm.ID_MATERIA')
        ->join('hora_clase as h','h.ID_HORA','=','gc.ID_HORA')
        ->where('ESTADO_GC','=','1')
        ->where('ID_ESTUDIANTE','=', 100004);
        $gruposInscrito = $gruposInscrito->get();
        return view('inscripcion.index',["gruposInscrito"=>$gruposInscrito]);
    }
    public function create(){
        return view("inscripcion");
    }
    public function store(InscripcionFormRequest $request ){
        $inscripcion = new Inscripcion;
        $inscripcion->ID_ESTUDIANTE = '100004';
        $inscripcion->ID_GRUPOLAB = $request->get('ID_GRUPOLAB');
        $inscripcion->save();
        return Redirect::to('inscripcion');

    }
    public function listarMaterias(){
        $materias=DB::table('materia')
        ->where('ESTADO','=','1');
        $materias = $materias->get();
        return view('inscripcion.listarMaterias',["materias"=>$materias]);
    }
    public function listarDocentesDeLaMateria( $idMateria ){
        $docentes=DB::table('docente_materia as dm')
        ->join('docente as d','d.ID_DOCENTE','=','dm.ID_DOCENTE')
        ->where('d.ESTADO','=','1')
        ->where('dm.ID_MATERIA','=',"".$idMateria."");
        $docentes = $docentes->get();
        return view('inscripcion.listarDocentes',["docentes"=>$docentes,"id"=>$idMateria]);
    }
    public function buscarGrupos($idMateria, $idDocente){
            $grupos=DB::table('grupo_laboratorio as g')
            ->join('docente_materia as dm', 'g.ID_DOC_MAT','=','dm.ID_DOCENTE_MATERIA')
            ->join('hora_clase as h', 'h.ID_HORA','=','g.ID_HORA')
            ->join('docente as doc', 'doc.ID_DOCENTE','=','dm.ID_DOCENTE')
            ->join('materia as mat', 'mat.ID_MATERIA','=','dm.ID_MATERIA')
            ->where('dm.ID_DOCENTE','=',"".$idDocente."")
            ->where('dm.ID_MATERIA','=',"".$idMateria."");
            $grupos = $grupos->get();
            return view('inscripcion.grupos',["grupos"=>$grupos]);
        
    }
}
