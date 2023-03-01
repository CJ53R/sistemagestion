@extends('layouts.home.app')

@section('title', 'Plana Docente')

@section('css')
<link rel="stylesheet" href="{{asset('../resources/css/home/trabajadorshow.css')}}">
@endsection



@section('content')

<div class="tuition bg-lig py-4">
    <div class="container">
      <div class="row">
        <button class="button fw-bold active" data-target="#primaria">Primaria<i class="fa-regular fa-hand-point-up"></i></button>
        <button class="button fw-bold" data-target="#secundaria">Secundaria<i class="fa-regular fa-hand-point-up"></i></button>
        <hr class="separator">
        <div class="col-12">
          <h3 class="cbg-primary fw-bold title">Docentes</h3>
        </div>
        <div class="col col-lg-12 contentinfo">
          <div data-content id="primaria" class="active">
              <div class="row justify-content-center">
                @foreach ($pdocentes as $pdocente)
                <div class="col col-lg-3 col-md-3 col-sm-4 col-12 text-center mt-4">
                  <div class="imagen">
                    <div class="docente-image">
                      @if ($pdocente->url=="")
                      <img src="{{asset('../resources/img/user_anonimo.png')}}" class="d-block w-100"> 
                      @else 
                      <img src="{{asset($pdocente->url)}}" class="d-block w-100"> 
                      @endif
                    </div>
                  </div>
                  <div class="docente-detalle">
                    <span class="nombre">{{$pdocente->name}}</span>
                    <span class="gseccciones">{{$pdocente->nivsec}}</span>
                  </div>
                  <div id="content" class="col-lg-12">
                    <div id="element{{$pdocente->id}}" class="col-lg-12" style="display: none;"> 
                        <div class="btn-cont"><button class="btnclose" href="#" id="hide{{$pdocente->id}}" title="Cerrar"><i class="fa-solid fa-circle-xmark"></i></button></div>
                        <div class="more-info">
                          @if ($pdocente->email!="")
                          <span><b>Correo:</b> {{$pdocente->email}}</span>
                          @endif
                          @if ($pdocente->telefono!="")
                          <span> <b>N° Celular:</b> {{$pdocente->telefono}}</span>
                          @endif
                        </div>
                    </div>
                  </div>
                  <div class="btn-cont"><button class="btnmore" href="#" id="show{{$pdocente->id}}"><i class="fa-solid fa-circle-plus"></i></button></div>
                </div>
                @endforeach
              </div>
          </div>
  
          <div data-content id="secundaria">
            <div class="row justify-content-center">
              @foreach ($sdocentes as $pdocente)
              <div class="col col-lg-3 col-md-3 col-sm-4 col-12 text-center mt-4">
                <div class="imagen">
                  <div class="docente-image">
                    @if ($pdocente->url=="")
                    <img src="{{asset('../resources/img/user_anonimo.jpg')}}" class="d-block w-100"> 
                    @else 
                    <img src="{{asset($pdocente->url)}}" class="d-block w-100"> 
                    @endif
                  </div>
                </div>
                <div class="docente-detalle">
                  <span class="nombre">{{$pdocente->name}}</span>
                  <span class="gseccciones">{{$pdocente->nivsec}}</span>
                </div>
                <div id="content" class="col-lg-12">
                  <div id="element{{$pdocente->id}}" class="col-lg-12" style="display: none;"> 
                      <div class="btn-cont"><button class="btnclose" id="hide{{$pdocente->id}}" title="Cerrar"><i class="fa-solid fa-circle-xmark"></i></button></div>
                      <div class="more-info">
                        @if ($pdocente->email!="")
                        <span><b>Correo:</b> {{$pdocente->email}}</span>
                        @endif
                        @if ($pdocente->telefono!="")
                        <span> <b>N° Celular:</b> {{$pdocente->telefono}}</span>
                        @endif
                      </div>
                  </div>
                </div>
                <div class="btn-cont"><button class="btnmore"  id="show{{$pdocente->id}}"><i class="fa-solid fa-circle-plus"></i></button></div>
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