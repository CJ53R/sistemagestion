@extends('layouts.home.app')

@section('title', 'Auxiliares de Educación')

@section('css')
<link rel="stylesheet" href="{{asset('../resources/css/home/trabajadorshow.css')}}">
@endsection



@section('content')

<div class="tuition bg-lig py-4">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h3 class="cbg-primary fw-bold title">Auxiliares de Educación</h3>
        </div>
        <hr class="separator">
        <div class="col col-lg-12 contentinfo">
          <div data-content id="primaria" class="active">
              <div class="row justify-content-center">
                @foreach ($auxiliares as $auxiliar)
                <div class="col col-lg-3 col-md-3 col-sm-4 col-12 text-center mt-4">
                  <div class="imagen">
                    <div class="docente-image">
                      @if ($auxiliar->url=="")
                      <img src="{{asset('../resources/img/user_anonimo.jpg')}}" class="d-block w-100"> 
                      @else 
                      <img src="{{asset($auxiliar->url)}}" class="d-block w-100"> 
                      @endif
                    </div>
                  </div>
                  <div class="docente-detalle">
                    <span class="nombre">{{$auxiliar->name}}</span>
                    <span class="gseccciones">{{$auxiliar->nivsec}}</span>
                  </div>
                  <div id="content" class="col-lg-12">
                    <div id="element{{$auxiliar->id}}" class="col-lg-12" style="display: none;"> 
                        <div class="btn-cont"><button class="btnclose" href="#" id="hide{{$auxiliar->id}}" title="Cerrar"><i class="fa-solid fa-circle-xmark"></i></button></div>
                        <div class="more-info">
                          @if ($auxiliar->email!="")
                          <span><b>Correo:</b> {{$auxiliar->email}}</span>
                          @endif
                          @if ($auxiliar->telefono!="")
                          <span> <b>N° Celular:</b> {{$auxiliar->telefono}}</span>
                          @endif
                        </div>
                    </div>
                  </div>
                  <div class="btn-cont"><button class="btnmore" href="#" id="show{{$auxiliar->id}}"><i class="fa-solid fa-circle-plus"></i></button></div>
                </div>
                @endforeach
              </div>
          </div>
        </div>
      </div>
        <div class="row justify-content-center align-items-center">
            <div class="col col-lg-4 col-md-4 col-sm-6 col-12">
              <div class="cont-image">
                <img src="" alt="">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> 
<script src="{{asset('../resources/js/home/docentes.js')}}"></script>
@endsection