@extends('layouts.docente')
@section('Mensaje')
<div class="callout callout-info">
  <h4>Bienvenido</h4>
 		En esta seccion debes seleccionar un grupo para poder asignarles tarea
</div>
@endsection
@section('contenido')
<div class="row">
  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
  	@foreach($materias as $materia)
  		<a href="#">
  			<h4>{{ $materia->NOMBRE_MATERIA }}</h4></a>

    @endforeach

 </div>
</div>

<div class="row">
	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
	<a href="crearGrupo"><button type="button" class="btn btn-primary">Añadir Materia </a></button>
 	</div>
 	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
	<a href="auxiliar/create"><button type="button" class="btn btn-primary">Registrar Auxiliar </a></button>
 	</div>
</div>

 @endsection
