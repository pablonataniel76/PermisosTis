@extends ('layouts.admin')
@section ('contenido')
    <div>
        <div>
            <h3>Gestiones</h3>
            <a href="gestion/create"><button>Crear nueva Gestión</button></a>
                        
        </div>
    </div>

    <div class="row">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </thead>
                @foreach ($gestiones as $doc)
                <tr>
                    <td>{{ $doc->ID_GESTION}}</td>
                    <td>{{ $doc->NOMBRE_GESTION}}</td>
                    <td><a href="{{URL::action('GestionController@edit', $doc->ID_GESTION)}}"><button class="btn btn-info">Editar</button></a>
                    <a href="" data-target="#modal-delete-{{$doc->ID_GESTION}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a></td>
                </tr>
                @include('administrador.gestion.modal')
                @endforeach
            </table>
        </div>
        {{$gestiones->render()}}
    </div>
@endsection