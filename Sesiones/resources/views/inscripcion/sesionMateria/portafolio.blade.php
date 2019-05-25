@extends('inscripcion.sesionMateria.principal')

@section('sesionMateria')
    <div class="row">

      
      <!-- <p>{{Request::path()}}</p>
      <p>{{public_path()}}</p> -->
    </div>
    <div class="container">

    <div class="list-group">
      <a href="#" class="list-group-item list-group-item-action">Archivo 1</a>
      <a href="#" class="list-group-item list-group-item-action">Archivo 2</a>
      <a href="#" class="list-group-item list-group-item-action">Archivo 3</a>
      <a href="#" class="list-group-item list-group-item-action">Archivo 4</a>
      <a href="#" class="list-group-item list-group-item-action">Archivo 5</a>
      <a href="#" class="list-group-item list-group-item-action">
      @if(count($errors)>0)
        <div>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach                
            </ul>
        </div>
        @endif
        
          <form action="">
          <div class="form-row align-items-center">
            
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="ID_PORTAFOLIO" value="{{$idpor}}">
            <input type="hidden" name="ruta" value="{{Request::path()}}">
            <div class="col-auto">
              <div class="form-group mx-sm-3 mb-2">
                  {!! Form::label('Subir Archivo') !!}
                  {!! Form::file('file', null) !!}
                </div>
            </div>
            <div class="col-auto">
              <button class="btn btn-primary mb-2 col-auto" type="">Enviar</button>
            </div>
          </div>
          </form>
      </a>

@endsection
 
 