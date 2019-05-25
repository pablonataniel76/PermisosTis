@extends('layouts.docente')

@section('contenido')

<h2>{{$grupoLaboratorio->NOMBRE_MATERIA}}</h2>
<h3>{{$grupoLaboratorio->GRUPOLAB}}</h3>
<h4>{{'Auxiliar Designado: '.$grupoLaboratorio->NOMBRE_AUXILIAR.' '.$grupoLaboratorio->APELLIDO_AUXILIAR}}</h4>
<a href="{{URL::action('ListaController@show',$grupoLaboratorio->ID_GRUPOLAB)}}"><h4>Lista de Estudiantes</h4></a>
<section class="content">
  <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
          <div class="box box-solid">
            <div class="box-body">
              <div class="box-group" id="accordion">
                @for ($i = 1; $i <= 1 ; $i++)
                  <div class="panel box box-default">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="{{'#collapse'.$i}}"><i class="fa fa-fw fa-plus-square"></i>
                        {{'Sesion '.$i}}
                      </a>
                    </h4>
                  </div>
                  <div id="{{'collapse'.$i}}" class="panel-collapse collapse">
                    <form role="form">
                          <div class="form-group">
                              <label for="exampleInputFile">Subir Tarea:</label>
                              <input type="file" id="exampleInputFile">

                              <p class="help-block">Seleccionar archivo .pdf .doc</p>
                          </div>
                          <div class="form-group">
                            <label>Añadir comentario sobre la tarea: </label>
                            <textarea class="form-control" rows="3"></textarea>
                          </div>
                          <div class="form-group">
                            <button type="button" class="btn btn-primary"> Enviar </button>
                          </div>
                      </form>
                     </div>
                </div>
                @endfor
           
               
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      
</section>



@endsection