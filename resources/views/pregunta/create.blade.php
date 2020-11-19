@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('Artista')])

@section('content')

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-plain">
            <div class="card-header card-header-primary">
              <h4 class="card-title mt-0"> Crear Pregunta</h4>
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
              <form action="{{ route('pregunta.store') }}" method="POST" >
                @csrf
                <div class="row">
                  <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <strong>Titulo:</strong>
                      <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                      <strong>Encuesta:</strong>
                      <textarea name="descripcion" id="" class="form-control" cols="30" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                      <strong>Tipo:</strong>
                      <input type="checkbox" name="correo_autorizado"  data-plugin="switchery" placeholder="Correo" value="0">
                    </div>

                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <strong>Cantidad (archivos):</strong>
                      <input type="number" name="cantidad_archivo" class="form-control" placeholder="Cantidad de archivos a guardar" value="0">
                    </div>
                    <div class="form-group">
                      <strong>Orden:</strong>
                      <input type="number" name="orden" class="form-control" placeholder="Orden" value="">
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