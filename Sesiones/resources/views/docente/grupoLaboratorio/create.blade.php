@extends('layouts.docente')

@section('contenido')

@if(count($errors)>0)
    <div>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
        </ul>
    </div>
@endif
{!!Form::open(array('url'=>'docente/grupoLaboratorio','method'=>'POST','autocomplete'=>'off'))!!}
{{Form::token()}}
<h2>Nuevo Grupo</h2>
	<div class="row">
     <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<div class="form-group">
              <label for="nombreMateria">Nombre de la Materia</label>

			<select  name="ID_DOC_MAT" id="ID_DOC_MAT"  class="form-control">
            	@foreach($materias as $materia)
                    <option value="{{$materia->ID_DOCENTE_MATERIA}}">{{ $materia->NOMBRE_MATERIA }}</option>
            	@endforeach
            </select>

        </div>
      </div>
    </div>
	 <div class="rowa">
	 	<form class="form-inline">
		<div class="panel panel-primary">
			<div class="panel-body">
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<div class="form-group">
						<label>Asignar Auxiliar: </label>
						<select name="ID_AUX" id="ID_AUX" class="form-control" >
							@foreach($auxiliares as $auxiliar)
							<option value="{{$auxiliar->ID_AUXILIAR}}">{{$auxiliar->NOMBRE_AUXILIAR.' '.$auxiliar->APELLIDO_AUXILIAR}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="form-group">
						<label> Selecionar Dia: </label>
						<select name="DIA" class="form-control" id="DIA">
							<option value="Lunes">Lunes</option>
							<option value="Martes">Martes</option>
							<option value="Miercoles">Miercoles</option>
							<option value="Jueves">Jueves</option>
							<option value="Viernes">Viernes</option>
							<option value="Sabado">Sabado</option>
						</select>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="form-group">
						<label>Seleccionar Hora: </label>
						<select name="ID_HORA" id="ID_HORA" class="form-control">
							@foreach($horarios as $hora)
							<option value="{{$hora->ID_HORA}}">{{$hora->HORA_INICIO.' - '.$hora->HORA_FIN}}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
		</div>
		</form>
     	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<div class="form-group">
				<!-- <input name="_token" value="{{ csrf_token() }}" type="hidden" > -->
				<button class="btn btn-primary" type="submit">Guardar</button>

				<button class="btn btn-danger" type="reset">Cancelar</button>
			{!!Form::close()!!}
			</div>
		</div>

	</div>
@endsection
