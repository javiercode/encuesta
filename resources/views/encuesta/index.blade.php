@extends('layouts.app', ['activePage' => 'encuesta', 'titlePage' => __('Administración de Encuesta')])

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
                  <th>Nombre</th>
                  <th>Periodo</th>
                  <th>Autorizaciones</th>
                  <th>Estado</th>
                  <th width="280px">Acciones</th>
                  </thead>
                  <tbody>
                  @foreach ($encuestaList as $encuesta)
                    <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{ $encuesta->nombre }} <br>
                        <small>{{ $encuesta->descripcion }}</small>
                      </td>
                      <td>{{ \Carbon\Carbon::parse($encuesta->fecha_inicio)->format('jS, M Y') }} -
                        {{ \Carbon\Carbon::parse($encuesta->fecha_fin)->format('jS, M Y') }}</td>
                      <td>
                        Correo: {{ $encuesta->correo_autorizado? 'SI':'NO' }} <br>
                        Session: {{ $encuesta->session_autorizado? 'SI':'NO' }} <br>
                        Por persona: {{ $encuesta->respuesta_persona? 'SI':'NO' }} <br>
                      </td>
                      <td> {{ $encuesta->estado? 'Abierto':'Cerrado' }}</td>
                      <td>
                        <a href="{{ route('encuesta.edit', $encuesta) }}">
                          <i class="material-icons">edit</i> </a>
                        <button type="button" rel="tooltip" title="Eliminar"
                                onclick="oPage.delete('{{ route('encuesta.delete') }}', '{{$pregunta->id}}')"
                                class="btn btn-danger btn-link btn-sm">
                          <i class="material-icons">close</i>
                        </button>
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
