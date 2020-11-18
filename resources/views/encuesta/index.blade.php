@extends('layouts.app', ['activePage' => 'cancion', 'titlePage' => __('Administración de Encuesta')])

@section('content')

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-plain">
            <div class="card-header card-header-primary">
              <h4 class="card-title mt-0"> Listado</h4>


              <div class="row">
                <div class="col-lg-12 margin-tb">
                  <div class="pull-right">
                    <a class="nav-link text-white" href="{{ route('encuesta.create') }}" title="Adicionar">
                      <i class="material-icons">add_box</i> </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead class="text-primary">
                  <th>Nro</th>
                  <th>Descripción</th>
                  <th>Periodo</th>
                  <th>Autorizaciones</th>
                  <th>Respuestas por Persona</th>
                  <th>Estado</th>
                  <th width="280px">Acciones</th>
                  </thead>
                  <tbody>
                  @foreach ($encuestaList as $encuesta)
                    <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{ $encuesta->nombre }}</td>
                      <td>{{ $encuesta->descripcion }}</td>
                      <td>{{ date_format($encuesta->fechaInicio, 'jS M Y') }} -
                        {{ date_format($encuesta->fechaFin, 'jS M Y') }} </td>
                      <td>
                        <form action="{{ route('artista.destroy',  $encuesta->id) }}" method="POST">
                          <a href="{{ route('artista.edit', $encuesta) }}">
                            <i class="material-icons">edit</i> </a>
                          @csrf
                          @method('DELETE')
                        <button type="submit" rel="tooltip" title="Eliminar"
                                class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">close</i>
                        </button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
  @endif



  {!! $encuestaList->links() !!}
@endsection
