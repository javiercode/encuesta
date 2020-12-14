@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'title' => __('Grafico')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row justify-content-center">
      <div class="col-lg-7 col-md-8">
          <h1 class="text-white text-center">{{ __('Encuesta online.') }}</h1>
          @auth
              auth
          @endauth
          @guest()
              invitado
          @endguest
      </div>
  </div>
</div>
@endsection
