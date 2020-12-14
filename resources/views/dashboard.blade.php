@extends('layouts.app', ['title' => __('Grafico'), 'titlePage' => __('Grafico'),
'activePage' => 'dashboard'])


@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row"><br><br></div>
      <div class="row"><br><br></div>
        <div class="row">
            <div class="row">
                <div class="col-lg-6 col-md-12"></div>
            </div>
        </div>
      <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-warning">
              <div class="ct-chart" id="websiteViewsChart"></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Tipos de preguntas</h4>
              <p class="card-category">Encuesta</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">RA</i> Resp. Abierta
                <i class="material-icons">RC</i> Resp. Cerrada <br>
                <i class="material-icons">MUU</i> Resp. Multiple Unica <br>
                <i class="material-icons">MUV</i> Respuesta Multiple Varias <br>
                <i class="material-icons">File</i> Respuesta De archivo <br>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4"></div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts('{{ route('admin.pregunta')}}');
    });
  </script>
@endpush
