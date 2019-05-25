@extends('layouts.docente')
@section('Mensaje')
<div class="callout callout-info">
  <h4>Bienvenido</h4>
 		En esta seccion debes seleccionar un grupo para poder asignarles tarea
</div>
@endsection
@section('contenido')
<h3>{{ $materia->NOMBRE_MATERIA }}</h3>
<div class="row">
  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
  	@foreach($grupos as $grupo)
  		@if($grupo->ESTADO_GC == 1)
  			<a href="{{URL::action('GrupoLaboratorioController@show',$grupo->ID_GRUPOLAB)}}"><h4>{{$grupo->HORA_INICIO}} - {{$grupo->DIA}}</h4></a>
             
        @endif
  		               
    @endforeach 
  	 
 </div>
 
 @endsection