@extends ('layouts.admin')
@section ('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado de auxiliares
            <a href="auxiliar/create"><button class="btn btn-success">Crear nuevo Auxiliar</button></a>
            </h3>
                        
        </div>
    </div>

    <div>
        @include('administrador.auxiliar.search')
    </div>

    <div class="row">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Id</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </thead>
                @foreach ($auxiliares as $doc)
                <tr>
                    <td>{{ $doc->ID_AUXILIAR}}</td>
                    <td>{{ $doc->NOMBRE_AUXILIAR}}</td>
                    <td>{{ $doc->APELLIDO_AUXILIAR}}</td>
                    <td>{{ $doc->EMAIL}}</td>
                    <td><a href="{{URL::action('AuxiliarController@edit', $doc->ID_AUXILIAR)}}"><button class="btn btn-info">Editar</button></a>
                    <a href="" data-target="#modal-delete-{{$doc->ID_AUXILIAR}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a></td>
                </tr>
                @include('administrador.auxiliar.modal')
                @endforeach
            </table>
        </div>
        {{$auxiliares->render()}}
    </div>
@endsection