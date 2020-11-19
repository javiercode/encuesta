@extends('layouts.app', ['activePage' => 'cancion', 'titlePage' => __('Administración de Pregunta')])

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
                    <a class="nav-link text-white" href="{{ route('pregunta.create') }}" title="Adicionar">
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
                  <th>Titulo</th>
                  <th>Encuesta</th>
                  <th>Tipo</th>
                  <th>Cantidad</th>
                  <th width="280px">Acciones</th>
                  </thead>
                  <tbody>
                  @foreach ($preguntaList as $pregunta)
                    <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{ $pregunta->titulo }} <br>
                        <strong>Orden: </strong> <small>{{ $pregunta->orden}}</small>
                      </td>
                      <td>{{ $encuestaList[$pregunta->id_encuesta] }}</td>
                      <td>{{ $pregunta->tipo}}</td>
                      <td> {{ $pregunta->cantidad_archivo}}</td>
                      <td>
                        <form action="{{ route('pregunta.destroy',  $pregunta->id) }}" method="POST">
                          <a href="{{ route('pregunta.edit', $pregunta) }}">
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



  {!! $preguntaList->links() !!}
@endsection
