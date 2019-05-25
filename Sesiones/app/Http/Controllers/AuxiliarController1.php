<?php

namespace App\Http\Controllers\Auxiliar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Estudiantes;
//use proyecto\Estudiante;
use App\Auxiliar;
use DB;


class AuxiliarController1 extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $estudiantes=DB::table('estudiante')->where('NOMBRE_ESTUDIANTE','LIKE','%'.$query.'%')
            // ->where ('grupo','=','1')
            ->orderBy('ID_ESTUDIANTE')
            ->paginate(10);
            return view('auxiliar.index',["estudiantes"=>$estudiantes,"searchText"=>$query]);
        }
    }
    public function create()
    {

    }
    public function store (FormRequest $request)
    {
        $aux = new estudiante();
        $aux->tipo_asignatura = $request->input('comentario');
        $aux->save();
        return redirect()->route('auxiliar.index');
    }
    public function show($id)
    {

    }
    public function edit($id)
    {
      // $estudiantes = Estudiantes::find($id);
      // return view('auxiliar.edit')->with([
      //   'ID_ESTUDIANTE'      => $estudiante
      // ]);

      return view("auxiliar.edit",["estudiante"=>Estudiantes::findOrFail($id)]);
    }
    public function update(FormRequest $request,$id)
    {
        $aux = estudiante::find($id);
        $aux->comentario = $request->input('comentario');
        $aux->save();
        return redirect()->route('auxiliar.index');
    }
    public function destroy($id)
    {

    }
}
