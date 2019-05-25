<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use NuevoProyecto\GrupoLaboratorio;
use NuevoProyecto\Http\Requests\GrupoLaboratorioFormRequest;
use DB;

class GrupoLaboratorioController extends Controller
{
	public function __construct(){

    }
    public function index(Request $request){
    	if ($request) {
             $materias = DB::table('docente_materia as dm')
                    ->join('docente as d','d.ID_DOCENTE','=','dm.ID_DOCENTE')
                    ->where('d.ESTADO','=','1')
                    ->where('dm.ID_DOCENTE','=','1001');
        $materias = $materias->get();

        $docMat = DB::table('docente_materia as dm')
                ->join('docente as d','d.ID_DOCENTE','=','dm.ID_DOCENTE')
                ->where('d.ESTADO','=','1')
                ->where('dm.ID_DOCENTE','=','1001')
                ->first();

        return view('docente.index',["materias"=>$materias,"docenteMateria"=>$docMat]);
        }
        
    }
    public function create(){
     $auxiliares = DB::table('auxiliar')->where('ESTADO','=','1')->get();
        $horarios = DB::table('hora_clase as horas')->get();
        $materias = DB::table('docente_materia as dm')
            ->join('docente as d','d.ID_DOCENTE','=','dm.ID_DOCENTE')
            ->join('materia as m','m.ID_MATERIA','=','dm.ID_MATERIA')
            ->where('dm.ID_DOCENTE','=','1001');
        $materias = $materias->get();

        return view('docente.grupoLaboratorio.create',["auxiliares"=>$auxiliares,"horarios"=>$horarios,"materias"=>$materias]);


    }
    public function store(GrupoLaboratorioFormRequest $request){
    try {
         DB::beginTransacion();
            $grupoLaboratorio=new GrupoLaboratorio;
            $grupoLaboratorio->ID_DOC_MAT=$request->get('ID_DOC_MAT');
            $grupoLaboratorio->ID_HORA=$request->get('ID_HORA');
            $grupoLaboratorio->ID_AUX=$request->get('ID_AUX');
            $grupoLaboratorio->DIA=$request->get('DIA');
            $grupoLaboratorio->ESTADO_GC='1';
            $grupoLaboratorio->save();
   
        
         DB::commit();

     } catch (\Exception $e) {
         DB::rollback();
     }
      return Redirect::to('docente/index');

    }
    public function show($id){
       $grupoLaboratorio=DB::table('grupo_laboratorio as gLab')
            ->join('docente_materia as gM','gM.ID_DOCENTE_MATERIA','=','gLab.ID_DOC_MAT')
            ->join('auxiliar as a','a.ID_AUXILIAR','=','gLab.ID_AUX')
            ->join('hora_clase as hora','hora.ID_HORA','=','gLab.ID_HORA')
            ->join('materia as m','gM.ID_MATERIA','=','m.ID_MATERIA')
            ->select('gLab.ID_GRUPOLAB','m.NOMBRE_MATERIA','a.NOMBRE_AUXILIAR','a.APELLIDO_AUXILIAR',DB::raw('CONCAT( gLab.DIA," ",hora.HORA_INICIO," - ",hora.HORA_FIN) as GRUPOLAB'))
            ->where('gLab.ID_GRUPOLAB','=',$id)
            ->groupBy('gLab.ID_GRUPOLAB','m.NOMBRE_MATERIA','a.NOMBRE_AUXILIAR','a.APELLIDO_AUXILIAR','gLab.DIA','hora.HORA_INICIO','hora.HORA_FIN')
            ->first();
                           
        return view("docente.grupoLaboratorio.show",["grupoLaboratorio"=>$grupoLaboratorio]);
    }

    public function edit($id){
    	return view("docente.grupoLaboratorio.edit",["grupoMateria"=>GrupoLaboratorio::findOrFail($id)]);
    }
    public function update(GrupoLaboratorioFormRequest $request, $id){
    	$grupoLaboratorio= GrupoLaboratorio::findOrFail($id);
     	$grupoLaboratorio->ID_AUXILIAR=$request->get('ID_AUXILIAR');
     	$grupoLaboratorio->ID_HORA=$request->get('ID_HORA');
     	$grupoLaboratorio->DIA=$request->get('DIA');
     	$grupoLaboratorio->NRO_SESION=$request->get('NRO_SESION');
       	$grupoLaboratorio->update();
       	return Redirect::to('docente/grupoLaboratorio');
    }
    public function destroy($id){
    	$grupoLaboratorio = GrupoLaboratorio::findOrFail($id);
    	$grupoLaboratorio->ESTADO='0';
    	$grupoLaboratorio->update();
    	return Redirect::to('docente/grupoLaboratorio');

    }
    public function listarGrupos($idMateria, $idDocente){
            $grupos=DB::table('grupo_laboratorio as gLab')
            ->join('docente_materia as dM', 'gLab.ID_DOC_MAT','=','dM.ID_DOCENTE_MATERIA')
            ->join('hora_clase as h', 'h.ID_HORA','=','gLab.ID_HORA')
            ->join('docente as doc', 'doc.ID_DOCENTE','=','dM.ID_DOCENTE')
            ->join('materia as mat', 'mat.ID_MATERIA','=','dM.ID_MATERIA')
            ->where('dM.ID_DOCENTE','=',"".$idDocente."")
            ->where('dM.ID_MATERIA','=',"".$idMateria."");
            $grupos = $grupos->get();

            $materia= DB::table('materia as m')
            ->where('m.ID_MATERIA','=',"".$idMateria."")
            ->first();
     return view('docente.grupoMateria.grupos',["grupos"=>$grupos,"materia"=>$materia]);
    }
}
