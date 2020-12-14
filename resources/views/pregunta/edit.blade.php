@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('Artista')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-plain">
            <div class="card-header card-header-primary">
              <h4 class="card-title mt-0"> Editar Pregunta</h4>
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

                <div class="row">
                  <div class="col-lg-12 margin-tb">
                    <div class="pull-right">
                      <a class="btn btn-primary" href="{{ route('pregunta.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
                    </div>
                  </div>
                </div>

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

                <form action="{{ route('pregunta.update', $pregunta->id) }}" method="POST">
                  @csrf
                  @method('PUT')

                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Titulo:</strong>
                                <input type="text" name="titulo" class="form-control" placeholder="Nombre" value="{{$pregunta->titulo}}">
                            </div>
                            <div class="form-group">
                                <strong>Encuesta:</strong>
                                <select name="id_encuesta" class="form-control">
                                    @foreach ($encuestaList as $encuesta)
                                        <option value="{{$encuesta['id']}}" {{$encuesta['id']==$pregunta->id_encuesta ? 'SELECTED': ''}}>{{$encuesta['nombre']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <strong>Tipo:</strong>
                                <select name="tipo" class="form-control">
                                    @foreach ($tipoEncuesta as $tipo)
                                        <option value="{{ ($tipo['key'])}}" {{$tipo['key']==$pregunta->tipo ? 'SELECTED': ''}}>{{ ($tipo['name'])}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Cantidad (archivos):</strong>
                                <input type="number" name="cantidad_archivo" value="{{$pregunta->cantidad_archivo}}" class="form-control" placeholder="Cantidad de archivos a guardar" >
                            </div>
                            <div class="form-group">
                                <strong>Orden:</strong>
                                <input type="number" name="orden" class="form-control" placeholder="Orden" value="{{$pregunta->orden}}">
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
