@extends('layouts.home.app')

@section('title', 'Noticia')

@section('css')
  <link rel="stylesheet" href="{{asset('../resources/css/home/shownoticia.css')}}">
@endsection



@section('content')

<section class="my-4">
    <div class="container">
       <div class="noticia">
        <div class="row align-items-center">
          <div class="col col-12">
            <div class="noticia-title">
              <h2>{{$noticia->titulo}}</h2>
            </div>
          </div>
          <div class="col col-12 text-end">
            <div class="noticia-date">
              <span><i class="fa-solid fa-calendar-days"></i> {{$noticia->fpublicacion}}</span>
            </div>
          </div>
          <div class="col col-lg-6 col-md-6 col-sm-12 mt-4">
            <div class="noticia-imagen">
              <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <label hidden>{{$j=0;}}</label>
                  @foreach ($imagenes as $imagen)
                  @if ($j==0)
                  <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{$j}}" class="btnpasarela active" aria-current="true" aria-label="Slide {{$j}}"></button>
                  @else
                  <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{$j}}" class="btnpasarela" aria-label="Slide {{$j}}"></button>
                  @endif
                  <span hidden>{{$j++}}</span>
                  @endforeach
                </div>
                <div class="carousel-inner">
                  <label hidden>{{$i=0;}}</label>
                  @foreach ($imagenes as $imagen)
                  <span hidden>{{$i++}}</span>
                  @if ($i==1)
                  <div class="carousel-item active" data-bs-interval="4000">
                    <img src="{{asset($imagen->url)}}" class="d-block w-100"> 
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                  </div>
                  @else
                  <div class="carousel-item" data-bs-interval="4000">
                    <img src="{{asset($imagen->url)}}" class="d-block w-100"> 
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                  </div>
                  @endif
                  @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                    <i class="fa-solid fa-angle-left"></i>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                    <i class="fa-solid fa-chevron-right"></i>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            </div>
          </div>
          <div class="col col-lg-6 col-md-6 col-sm-12 col-12 mt-4">
            <div class="noticia-detalle">
              <p>{{ $noticia->largedescripcion}}</p>
            </div>
          </div>
        </div>
       </div>
    </div>
  </section>
@endsection



@section('script')
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  @if (session('save')=='ok')
    <script>
      swal({
                title: "¡Bien!",
                text: "¡Acaba de Registrar una Nueva Noticia!",
                icon: "success",
                button: "OK!",
              });
    </script>
@endif
@endsection