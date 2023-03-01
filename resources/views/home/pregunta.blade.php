@extends('layouts.home.app')

@section('title', 'Comite de Gestión de Bienestar')

@section('css')
<link rel="stylesheet" href="{{asset('../resources/css/home/comite.css')}}">
<link rel="stylesheet" href="{{asset('../resources/css/home/pregunta.css')}}">
@endsection



@section('content')
<header id="contenedor-portada" style="background: url('{{asset($imagenp->url)}}'); background-size: cover; background-repeat: no-repeat;background-position: center;">
  <div id="portada-text">
    <div class="container">
      <h1 class="title-portada">PREGUNTAS FRECUENTES</h1>
    </div>
  </div>
</header>

<div class="tuition bg-lig py-4">
  <div class="container">
    <div class="row justify-content-center cont">
      @foreach ($preguntas as $pregunta)
      <div class="btn-cont"><button class="btnclose btn fifth" id="hide{{$pregunta->id}}" title="Cerrar">{{$pregunta->pregunta}}</button></div>
      <div id="cont-info{{$pregunta->id}}" class="cont-info" style="display: none;">
        <div class="informacion">
          {{$pregunta->respuesta}}
        </div>
      </div> 
      @endforeach   
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script>
$(document).ready(function () {

  $(document).on("click", ".btnclose", function(e){
    let btn_id2 = $(this).attr('id');
      let n =btn_id2.substr(4);
  $('#hide'+n).on('click', function() {
  var x = document.getElementById("cont-info"+n);
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
        });

    });

    });
</script>
@endsection