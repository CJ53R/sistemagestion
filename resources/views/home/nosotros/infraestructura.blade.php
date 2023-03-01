@extends('layouts.home.app')

@section('title', 'Infraestructura')

@section('css')
<link rel="stylesheet" href="{{asset('../resources/css/home/infraestructura.css')}}">
@endsection



@section('content')

<div class="tuition bg-lig py-4">
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="modal-img" id="cont-modal-img">
        <img src="{{asset('../resources/img/img_1.jpg')}}" id="imgre" alt="">
        <span onclick="cerrarVista()">X</span>
      </div>

      <h1 class="fw-bold cbg-primary mb-4"><span>Nuestro Campus</span></h1>
  
      <div class="galeria">
        @foreach ($imagenes as $imagen)
        <img src="{{asset($imagen->url)}}" onclick="abrirVista(this.src)" alt="">
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection



@section('script')

<script src="{{asset('../resources/js/home/infraestructura.js')}}"></script>

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