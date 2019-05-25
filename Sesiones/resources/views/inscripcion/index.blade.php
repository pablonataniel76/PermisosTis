@extends('layouts.base1')
@section('inscripcion-estudiante')
    <div class="row">
        <div class ="pad">
            <center><h2>Materias en las que estas Inscrito</h2></center>
            <div class="form-group">
            
            @foreach ($gruposInscrito as $gi)
                @if($gi->ESTADO == 1)
                    <div class="prueba" >   
                        <center>
                        <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$gi->NOMBRE_MATERIA}}</h5>
                          <p class="card-text">{{$gi->NOMBRE_DOCENTE}} <br>
                                {{$gi->HORA_INICIO}}<br>
                                {{$gi->DIA}}
                            </p>   
                           <a href="{{URL::action('SesionMateriaController@listarSesiones',array('idGrupo'=>$gi->ID_GRUPOLAB , 'idEstudiante'=>$gi->ID_ESTUDIANTE))}}" class="btn btn-primary">Entrar al Grupo</a>
                        </div>
                        </div>
                        </center>          
                    </div>
                @endif
            @endforeach
            <div class="prueba1"  >
            <div class="card1">
                    <div class="card-body">
                            <center>
                                <a href="inscripcion/listarMaterias">
                                    <br>
                                    <img src="{{ asset('/img/mas.png') }}" alt="Más" width="120px">
                                    <br>
                                    <br>
                                </a>
                            </center>
                    </div>
                </div>       
            </div>
  </div>
  </div>          
    
@endsection

