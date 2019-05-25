@extends('layouts.base1')
@section('inscripcion-estudiante')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <center><h2>Inscribirse a un Grupo</h2></center>
            <div class="form-group">
            {!!Form::open(array('url'=>'inscripcion','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            
            <div class="form-group">
            <label for="ID_GRUPOLAB"><h4>Seleccione su horario:</h4></label>
            <select class="form-control" name="ID_GRUPOLAB">
            @foreach ($grupos as $g)
                @if($g->ESTADO_GC == 1)
                        <option value="{{$g->ID_GRUPOLAB}}">{{$g->HORA_INICIO}} - {{$g->DIA}}</option>   
                @endif
            @endforeach
            </select>
            </div>
            <button class="btn btn-primary" type="submit">Inscribirse</button>
            {!!Form::close()!!}
            </div>
        </div>
    </div>
@endsection