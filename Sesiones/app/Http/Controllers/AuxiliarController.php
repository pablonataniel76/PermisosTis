<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auxiliar;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\AuxiliarFormRequest;
use DB;


class AuxiliarController extends Controller
{
    public function __construct(){
    }

    public function index(Request $request){
       
    }

    public function create()
    {
        return view("docente.auxiliar.create");
    }
    public function store (AuxiliarFormRequest $request)
    {
        $auxiliar=new Auxiliar;
        $auxiliar->CONTRASENIA=$request->get('CONTRASENIA');
        $auxiliar->EMAIL=$request->get('EMAIL');
        $auxiliar->NOMBRE_AUXILIAR=$request->get('NOMBRE_AUXILIAR');
        $auxiliar->APELLIDO_AUXILIAR=$request->get('APELLIDO_AUXILIAR');
        $auxiliar->CODIGO_SIS=$request->get('CODIGO_SIS');
        $auxiliar->ESTADO='1';
        $auxiliar->save();
        return Redirect::to('docente/index');
    }
    public function show($id)
    {
        return view("docente.auxiliar.show",["auxiliar"=>Auxiliar::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("docente.auxiliar.edit",["auxiliar"=>Auxiliar::findOrFail($id)]);
    }
    public function update()
    {
    }
    public function destroy()
    {
       
    }
}
