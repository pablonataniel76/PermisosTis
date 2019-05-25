<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gestion;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\GestionFormRequest;
use DB;


class GestionController extends Controller
{
    public function __construct(){
    }

    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $gestiones=DB::table('gestion')->where('NOMBRE_GESTION','LIKE','%'.$query.'%')
            ->where ('ESTADO', '=', '1')
            ->orderBy('ID_GESTION','desc')
            ->paginate(3);
            return view('administrador.gestion.index',["gestiones"=>$gestiones,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("administrador.gestion.create");
    }
    public function store (GestionFormRequest $request)
    {
        $gestion=new Gestion;
        $gestion->NOMBRE_GESTION=$request->get('NOMBRE_GESTION');
        $gestion->ESTADO='1';
        $gestion->save();
        return Redirect::to('administrador/gestion');
    }
    public function show($id)
    {
        return view("administrador.gestion.show",["gestion"=>Gestion::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("administrador.gestion.edit",["gestion"=>Gestion::findOrFail($id)]);
    }
    public function update(GestionFormRequest $request,$id)
    {
        $gestion=Gestion::findOrFail($id);
        $gestion->NOMBRE_GESTION=$request->get('NOMBRE_GESTION');
        $gestion->update();
        return Redirect::to('administrador/gestion');
    }
    public function destroy($id)
    {
        $gestion=Gestion::findOrFail($id);
        $gestion->ESTADO='0';
        $gestion->update();
        return Redirect::to('administrador/gestion');
    }
}
