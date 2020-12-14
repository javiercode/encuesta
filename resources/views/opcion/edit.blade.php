@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('Artista')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-plain">
            <div class="card-header card-header-primary">
              <h4 class="card-title mt-0"> Editar Opcion</h4>
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
                      <a class="btn btn-primary" href="{{ route('opcion.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
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

                <form action="{{ route('opcion.update', $opcion->id) }}" method="POST">
                  @csrf
                  @method('PUT')

                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Pregunta:</strong>
                                <select name="id_pregunta" class="form-control">
                                    @foreach ($preguntaList as $pregunta)
                                        <option value="{{$pregunta['id']}}" {{$pregunta['id']==$opcion->id_pregunta ? 'SELECTED': ''}}>{{$pregunta['titulo']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <strong>Valor:</strong>
                                <input type="text" name="valor" class="form-control" placeholder="Valor" value="{{$opcion->valor}}">
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Texto:</strong>
                                <input type="text" name="texto" class="form-control" placeholder="Texto" value="{{$opcion->texto}}">
                            </div>
                            <div class="form-group">
                                <strong>Orden:</strong>
                                <input type="number" name="orden"  data-plugin="switchery" placeholder="Orden" value="{{$opcion->orden}}">
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
