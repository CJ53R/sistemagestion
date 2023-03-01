@extends('layouts.home.app')

@section('title', 'Personal Administrativo')

@section('css')
<link rel="stylesheet" href="{{asset('../resources/css/home/trabajadorshow.css')}}">
@endsection



@section('content')

<div class="tuition bg-lig py-4">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h3 class="cbg-primary fw-bold title">Personal Administrativo</h3>
        </div>
        <button class="button fw-bold active" data-target="#oficinista">Oficinistas<i class="fa-regular fa-hand-point-up"></i></button>
        <button class="button fw-bold" data-target="#biblioteca">Auxiliares de Biblioteca<i class="fa-regular fa-hand-point-up"></i></button>
        <button class="button fw-bold" data-target="#laboratorio">Auxiliares de Laboratorio<i class="fa-regular fa-hand-point-up"></i></button>
        <button class="button fw-bold" data-target="#servicio">Personal de Servicios<i class="fa-regular fa-hand-point-up"></i></button>
        <hr class="separator">
        <div class="col col-lg-12 contentinfo">
          <div data-content id="oficinista" class="active">
              <div class="row justify-content-center">
                @foreach ($oficinistas as $oficinista)
                <div class="col col-lg-3 col-md-3 col-sm-4 col-12 text-center mt-4">
                  <div class="imagen">
                    <div class="docente-image">
                      @if ($oficinista->url=="")
                      <img src="{{asset('../resources/img/user_anonimo.jpg')}}" class="d-block w-100"> 
                      @else 
                      <img src="{{asset($oficinista->url)}}" class="d-block w-100"> 
                      @endif
                    </div>
                  </div>
                  <div class="docente-detalle">
                    <span class="nombre">{{$oficinista->name}}</span>
                    <span class="gseccciones">{{$oficinista->nivsec}}</span>
                  </div>
                  <div id="content" class="col-lg-12">
                    <div id="element{{$oficinista->id}}" class="col-lg-12" style="display: none;"> 
                        <div class="btn-cont"><button class="btnclose" href="#" id="hide{{$oficinista->id}}" title="Cerrar"><i class="fa-solid fa-circle-xmark"></i></button></div>
                        <div class="more-info">
                          @if ($oficinista->email!="")
                          <span><b>Correo:</b> {{$oficinista->email}}</span>
                          @endif
                          @if ($oficinista->telefono!="")
                          <span> <b>N° Celular:</b> {{$oficinista->telefono}}</span>
                          @endif
                        </div>
                    </div>
                  </div>
                  <div class="btn-cont"><button class="btnmore" href="#" id="show{{$oficinista->id}}"><i class="fa-solid fa-circle-plus"></i></button></div>
                </div>
                @endforeach
              </div>
          </div>
  
          <div data-content id="biblioteca">
            <div class="row justify-content-center">
              @foreach ($abibliotecas as $abiblioteca)
              <div class="col col-lg-3 col-md-3 col-sm-4 col-12 text-center mt-4">
                <div class="imagen">
                  <div class="docente-image">
                    @if ($abiblioteca->url=="")
                    <img src="{{asset('../resources/img/user_anonimo.jpg')}}" class="d-block w-100"> 
                    @else 
                    <img src="{{asset($abiblioteca->url)}}" class="d-block w-100"> 
                    @endif
                  </div>
                </div>
                <div class="docente-detalle">
                  <span class="nombre">{{$abiblioteca->name}}</span>
                  <span class="gseccciones">{{$abiblioteca->nivsec}}</span>
                </div>
                <div id="content" class="col-lg-12">
                  <div id="element{{$abiblioteca->id}}" class="col-lg-12" style="display: none;"> 
                      <div class="btn-cont"><button class="btnclose" id="hide{{$abiblioteca->id}}" title="Cerrar"><i class="fa-solid fa-circle-xmark"></i></button></div>
                      <div class="more-info">
                        @if ($abiblioteca->email!="")
                        <span><b>Correo:</b> {{$abiblioteca->email}}</span>
                        @endif
                        @if ($abiblioteca->telefono!="")
                        <span> <b>N° Celular:</b> {{$abiblioteca->telefono}}</span>
                        @endif
                      </div>
                  </div>
                </div>
                <div class="btn-cont"><button class="btnmore"  id="show{{$abiblioteca->id}}"><i class="fa-solid fa-circle-plus"></i></button></div>
              </div>
              @endforeach
            </div>
          </div>

          <div data-content id="laboratorio">
            <div class="row justify-content-center">
              @foreach ($alaboratorios as $alaboratorio)
              <div class="col col-lg-3 col-md-3 col-sm-4 col-12 text-center mt-4">
                <div class="imagen">
                  <div class="docente-image">
                    @if ($alaboratorio->url=="")
                    <img src="{{asset('../resources/img/user_anonimo.jpg')}}" class="d-block w-100"> 
                    @else 
                    <img src="{{asset($alaboratorio->url)}}" class="d-block w-100"> 
                    @endif
                  </div>
                </div>
                <div class="docente-detalle">
                  <span class="nombre">{{$alaboratorio->name}}</span>
                  <span class="gseccciones">{{$alaboratorio->nivsec}}</span>
                </div>
                <div id="content" class="col-lg-12">
                  <div id="element{{$alaboratorio->id}}" class="col-lg-12" style="display: none;"> 
                      <div class="btn-cont"><button class="btnclose" id="hide{{$alaboratorio->id}}" title="Cerrar"><i class="fa-solid fa-circle-xmark"></i></button></div>
                      <div class="more-info">
                        @if ($alaboratorio->email!="")
                        <span><b>Correo:</b> {{$alaboratorio->email}}</span>
                        @endif
                        @if ($alaboratorio->telefono!="")
                        <span> <b>N° Celular:</b> {{$alaboratorio->telefono}}</span>
                        @endif
                      </div>
                  </div>
                </div>
                <div class="btn-cont"><button class="btnmore"  id="show{{$alaboratorio->id}}"><i class="fa-solid fa-circle-plus"></i></button></div>
              </div>
              @endforeach
            </div>
          </div>

          
          <div data-content id="servicio">
            <div class="row justify-content-center">
              @foreach ($pservicios as $pservicio)
              <div class="col col-lg-3 col-md-3 col-sm-4 col-12 text-center mt-4">
                <div class="imagen">
                  <div class="docente-image">
                    @if ($pservicio->url=="")
                    <img src="{{asset('../resources/img/user_anonimo.jpg')}}" class="d-block w-100"> 
                    @else 
                    <img src="{{asset($pservicio->url)}}" class="d-block w-100"> 
                    @endif
                  </div>
                </div>
                <div class="docente-detalle">
                  <span class="nombre">{{$pservicio->name}}</span>
                  <span class="gseccciones">{{$pservicio->nivsec}}</span>
                </div>
                <div id="content" class="col-lg-12">
                  <div id="element{{$pservicio->id}}" class="col-lg-12" style="display: none;"> 
                      <div class="btn-cont"><button class="btnclose" id="hide{{$pservicio->id}}" title="Cerrar"><i class="fa-solid fa-circle-xmark"></i></button></div>
                      <div class="more-info">
                        @if ($pservicio->email!="")
                        <span><b>Correo:</b> {{$pservicio->email}}</span>
                        @endif
                        @if ($pservicio->telefono!="")
                        <span> <b>N° Celular:</b> {{$pservicio->telefono}}</span>
                        @endif
                      </div>
                  </div>
                </div>
                <div class="btn-cont"><button class="btnmore"  id="show{{$pservicio->id}}"><i class="fa-solid fa-circle-plus"></i></button></div>
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