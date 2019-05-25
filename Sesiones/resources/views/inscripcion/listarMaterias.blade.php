
@extends('layouts.base1')
@section('inscripcion-estudiante')
<div class="row">
        <div class ="pad">
            <center><h2>Inscribirse a una Materia</h2></center>
            <div class="form-group">
            
            @foreach ($materias as $m)
                @if($m->ESTADO == 1)
                    <div class="prueba" >   
                        <center>
                        <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$m->NOMBRE_MATERIA}}</h5>
                           <a href="{{URL::action('InscripcionController@listarDocentesDeLaMateria',$m->ID_MATERIA)}}" class="btn btn-primary">Inscribirse Grupo</a>
                        </div>
                        </div>
                        </center>          
                    </div>
                @endif
            @endforeach
            
  </div>
  </div>
@endsection

