@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('Artista')])

@section('content')

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-plain">
            <div class="card-header card-header-primary">
              <h4 class="card-title mt-0"> Crear Opcion</h4>
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
              <form action="{{ route('opcion.store') }}" method="POST" >
                @csrf
                <div class="row">
                  <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <strong>Pregunta:</strong>
                      <select name="id_pregunta" class="form-control">
                        @foreach ($preguntaList as $pregunta)
                          <option value="{{$pregunta['id']}}">{{$pregunta['titulo']}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <strong>Valor:</strong>
                      <input type="text" name="valor" class="form-control" placeholder="Valor">
                    </div>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <strong>Texto:</strong>
                      <input type="text" name="texto" class="form-control" placeholder="Texto">
                    </div>
                    <div class="form-group">
                      <strong>Orden:</strong>
                      <input type="number" name="orden"  data-plugin="switchery" placeholder="Orden">
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