@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('Artista')])

@section('content')

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-plain">
            <div class="card-header card-header-primary">
              <h4 class="card-title mt-0"> Crear Encuesta</h4>
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
              @if ($errors->any())
                <div class="alert alert-danger">
                  <strong>Whoops!</strong> There were some problems with your input.<br><br>
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
              <form action="{{ route('encuesta.store') }}" method="POST" >
                @csrf
                <div class="row">
                  <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <strong>Nombre:</strong>
                      <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                      <strong>Descripcion:</strong>
                      <textarea name="descripcion" id="" class="form-control" cols="30" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                      <strong>Correo:</strong>
                      <input type="checkbox" name="correo_autorizado"  data-plugin="switchery" placeholder="Correo" value="0">
                    </div>
                    <div class="form-group">
                      <strong>Sessión:</strong>
                      <input type="checkbox" name="session_autorizado" class="form-check-inline" placeholder="Sessión" value="0">
                    </div>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <strong>Inicio:</strong>
                      <input type="date" name="fecha_inicio" class="form-control" placeholder="Inicio" value="">
                    </div>
                    <div class="form-group">
                      <strong>Fin:</strong>
                      <input type="date" name="fecha_fin" class="form-control" placeholder="Fin" value="">
                    </div>
                    <div class="form-group">
                      <strong>Por Persona:</strong>
                      <input type="checkbox" name="respuesta_persona" class="form-check-inline" placeholder="Contador" value="0">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection