@extends('layouts.home.app')

@section('title', 'Horarios')

@section('css')
<link rel="stylesheet" href="{{asset('../resources/css/home/horario.css')}}">
@endsection



@section('content')

<div class="tuition bg-lig py-4">
  <div class="container">
    <div class="row justify-content-center cont">
      <button class="button fw-bold active" data-target="#primaria">Primaria<i class="fa-regular fa-hand-point-up"></i></button>
      <button class="button fw-bold" data-target="#secundaria">Secundaria<i class="fa-regular fa-hand-point-up"></i></button>
      <hr class="separator">
      <div class="ctn-tittle">
        <h3>Horarios</h3>
      </div>
      <div class="col col-lg-12 contentinfo">
          <div data-content id="primaria" class="active">
              <div class="row justify-content-center align-items-center">
                @foreach ($phorarios as $phorarios)
                <div class="col col-lg-3 col-md-4 col-sm-6 col-12 ctn-btn mt-3">
                  <li><a href="{{asset($phorarios->url)}}" target="blank">{{$phorarios->nombre}}</a></li>
                </div>
                @endforeach
              </div>
          </div>
  
          <div data-content id="secundaria">
            <div class="row justify-content-center align-items-center">
              @foreach ($shorarios as $shorarios)
                <div class="col col-lg-3 col-md-4 col-sm-6 col-12 ctn-btn mt-3">
                  <li><a href="{{asset($shorarios->url)}}" target="blank">{{$shorarios->nombre}}</a></li>
                </div>
                @endforeach
            </div>
          </div>
      </div>
    </div>
</div>
</div>
@endsection



@section('script')

@if (session('info')=='error')
  <script>
    swal({
              title: "¡Uy!",
              text: "¡Datos no encontrados!",
              icon: "error",
              button: "OK!",
            });
</script>
@endif
@endsection