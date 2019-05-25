<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use NuevoProyecto\GrupoMateria;
use NuevoProyecto\Http\Request\GrupoMateriaFormRequest;
use DB;

class GrupoMateriaController extends Controller
{
   public function __construct(){

    }
    public function index(Request $request){
    	if($request){
    		$grupoMateria=DB::table('grupo-materia as gM')
    		->join('grupo-laboratorio as gLab','gM.ID_GRUPO','=','gLab.ID_GRUPO')
    		->join('hora-clase as hora','gLab.ID_HORA','=','hora.ID_HORA')
    		->join('materia as m','gM.ID_MATERIA','=','m.ID_MATERIA')
    		->select('gLab.ID_GRUPOLAB','gM.ID_GRUPO','m.NOMBRE_MATERIA','gM.GRUPO','gLab.DIA','hora.HORA_INICIO','hora.HORA_FIN', DB::raw('CONCAT("Grupo ",gM.GRUPO," - ",gLab.DIA," ",hora.HORA_INICIO,"-",hora.HORA_FIN) as LISTA'))
    		->where('gM.ESTADO','=','1')
    		->orderBy('gLab.ID_GRUPOLAB','desc')
    		->groupBy('gLab.ID_GRUPOLAB','gM.ID_GRUPO','m.NOMBRE_MATERIA','gM.GRUPO','gLab.DIA','hora.HORA_INICIO','hora.HORA_FIN');
    		$grupoMateria = $grupoMateria->get();
    		return view ('docente.grupoMateria.index',['grupoMateria'=>$grupoMateria]);
    	}
    }
    public function create(){
   		$materias = DB::table('materia')
    				->where('ESTADO','=','1')
    				->get();
      	return view('docente.grupoMateria.create',["materias"=>$materias]);

    }
    public function store(GrupoMateriaFormRequest $request){
    	$grupoMateria=new GrupoMateria;
    	$grupoMateria->ID_MATERIA=$request->get('ID_MATERIA');
     	$grupoMateria->ID_DOCENTE=$request->get('ID_DOCENTE');
     	$grupoMateria->GRUPO=$request->get('GRUPO');
     	$grupoMateria->ESTADO='1';
     	$grupoMateria->save();
     	return Redirect::to('docente/grupoMateria');
    }
    public function show($id){
    	return view("docente.grupoMateria.show",["grupoMateria"=>GrupoMateria::findOrFail($id)]);
    }
    public function edit($id){
    	return view("docente.grupoMateria.edit",["grupoMateria"=>GrupoMateria::findOrFail($id)]);
    }
    public function update(GrupoMateriaFormRequest $request, $id){
    	$grupoMateria= GrupoMateria::findOrFail($id);
     	$grupoMateria->ID_MATERIA=$request->get('ID_MATERIA');
     	$grupoMateria->ID_DOCENTE=$request->get('ID_DOCENTE');
     	$grupoMateria->GRUPO=$request->get('GRUPO');
       	$grupoMateria->update();
       	return Redirect::to('docente/grupoMateria');
    }
    public function destroy($id){
    	$grupoMateria = GrupoMateria::findOrFail($id);
    	$grupoMateria->ESTADO='0';
    	$grupoMateria->update();
    	return Redirect::to('docente/grupoMateria');

    }
   
   

}
