@extends('layouts.app', ['activePage' => 'opcion', 'titlePage' => __('Administración de Opciones')])

@section('content')

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-plain">
            <div class="card-header card-header-primary">
              <h4 class="card-title mt-0"> Listado</h4>
              @auth
                auth
              @endauth
              @guest()
                guest
              @endguest
              <div class="row">
                <div class="col-lg-12 margin-tb">
                  <div class="pull-right">
                    <a class="nav-link text-white" href="{{ route('opcion.create') }}" title="Adicionar">
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
                  <th>Valor</th>
                  <th>Orden</th>
                  <th width="280px">Acciones</th>
                  </thead>
                  <tbody>
                  @foreach ($opcionList as $opcion)
                    <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{ $opcion->valor }} <br>
                        <strong>texto: </strong> <small>{{ $opcion->texto }}</small>
                      </td>
                      <td>{{ $opcion->orden }}</td>
                      <td>
                        <form action="{{ route('opcion.destroy',  $opcion->id) }}" method="POST">
                          <a href="{{ route('opcion.edit', $opcion) }}">
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



  {!! $opcionList->links() !!}
@endsection
