<?php

namespace App\Http\Controllers\Auxiliar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Estudiantes;
use App\Estudiante;
use App\Auxiliar;
use DB;




class AuxiliarController2 extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $estudiantes=DB::table('estudiante')->where('nombreE','LIKE','%'.$query.'%')
            ->where ('grupo','=','2')
            ->orderBy('idestud')
            ->paginate(10);
            return view('auxiliar/grupo2.index',["estudiantes"=>$estudiantes,"searchText"=>$query]);
        }
    }
    public function create()
    {

    }
    public function store (FormRequest $request)
    {

    }
    public function show($id)
    {

    }
    public function edit($id)
    {

    }
    public function update(FormRequest $request,$id)
    {

    }
    public function destroy($id)
    {

    }
}
