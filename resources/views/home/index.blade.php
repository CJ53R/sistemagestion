@extends('layouts.home.app')

@section('title', 'Inicio')

@section('css')
<link href="{{asset('../resources/lib/animate/animate.min.css')}}" rel="stylesheet">
<link href="{{asset('../resources/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('../resources/css/home/inicio.css')}}">


@endsection



@section('content')

  @if ($aviso->activamatricula_id==1 && $aviso->url!='')
  <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content m-0 p-0">
        <div class="modal-body m-0 p-0">
              <button type="button" class="btn position-absolute top-0 end-0"  data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-circle-xmark"></i></button>
              <div class="galeria">
                <img src="{{asset($aviso->url)}}"  alt="">
              </div>
        </div>
      </div>
    </div>
  </div>    
  @endif
  

  <div class="container my-4">
      <div class="cont-img">
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <label hidden>{{$j=0;}}</label>
              @foreach ($portadas as $portada)
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
              @foreach ($portadas as $portada)
              <span hidden>{{$i++}}</span>
              @if ($i==1)
              <div class="carousel-item active" data-bs-interval="5000">
                <img src="{{asset($portada->url)}}" class="d-block w-100"> 
                <div class="carousel-caption d-none d-md-block">
                </div>
              </div>
              @else
              <div class="carousel-item" data-bs-interval="4000">
                <img src="{{asset($portada->url)}}" class="d-block w-100"> 
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
 
  <div class="nav-ayuda mb-4" id="navhelp">
      <div class="container">
          <nav class="row">
              <li class="col col-lg-3 col-12"><a href="#">Atención Permanente <br><i class="fa-regular fa-handshake"></i></a></li>
              <li class="col col-lg-3 col-12"><a href="#">Atención Alumnos <br><span><i class="fa-solid fa-phone"></i> (043) 422711</span></a></li>
              <li class="col col-lg-3 col-12"><a href="{{route('home.preguntas')}}">Preguntas Frecuentes <br><i class="fa-solid fa-circle-question"></i></a></li>
              <li class="col col-lg-3 col-12"><a href="#navhelp">Horarios de Atención <br><i class="fa-solid fa-clock"></i></a></li>
              <div class="animation start-help"></div>
              <div class="horarios" id="horarios">
                  <h6 class="mt-4">8:00 am - 1:00 pm</h6> 
                  <span>Lun. - Vier.</span>
              </div>
          </nav>
      </div>
  </div>

  @if ($div->activamatricula_id=='1')
  <div class="tuition bg-grey">
    <div class="container">
        <div class="row">
            <div class="col col-lg-4 col-12 titlemat">
                <h4 class="fw-bold" id="tmat">Matrícula 2023</h4>
            </div>
            <div class="col col-lg-8 col-12 text-center">
                <div class="row">
                    <div class="col col-lg-4 col-md-4">
                        <button class="button fw-bold active" data-target="#inicio"><i class="fa-solid fa-plus"></i> Alumno Nuevo</button>
                    </div>
                    <div class="col col-lg-4 col-md-4">
                        <button class="button fw-bold" data-target="#productos"><i class="fa-solid fa-right-left"></i> Traslado</button>
                    </div>
                    <div class="col col-lg-4 col-md-4">
                        <button class="button fw-bold" data-target="#contacto"><i class="fa-regular fa-star"></i> Alumno Regular</button>
                    </div>
                    <hr class="separator">
                    <div class="col col-lg-12 contentinfo">
                        <div data-content id="inicio" class="active">
                            <div class="row justify-content-center">
                                <div class="col col-lg-4 col-12">
                                    <div class="titleinfo">
                                        <i class="fa-regular fa-hand-point-down"></i>
                                        <span>Paso 1</span>
                                    </div>
                                    <div class="pasosinfo">
                                        Completar la ficha de admisión 2023.
                                    </div>
                                </div>
                                <div class="col col-lg-4 col-12">
                                    <div class="titleinfo">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                        <span>Paso 2</span>
                                    </div>
                                    <div class="pasosinfo">
                                        Documentos a solicitar: <br>
                                        • Foto nítida por ambos lados del DNI del alumno.<br>
                                        • Foto nítida por ambos lados del DNI del P.F. y/o apoderado.<br>
                                        • Libreta de notas. <br>
                                        • Cartilla de vacunación.
                                    </div>
                                </div>
                                <div class="col col-lg-4 col-12">
                                    <div class="titleinfo">
                                        <i class="fa-regular fa-file"></i>
                                        <span>Paso 3</span>
                                    </div>
                                    <div class="pasosinfo">
                                        • Pago de matrícula. <br>
                                        • Firmar el compromiso de matrícula. <br>
                                        • Completar y firmar la ficha médica del estudiante.
                                    </div>
                                </div>
                            </div>
                        </div>
                
                        <div data-content id="productos">
                            <div class="row justify-content-center">
                                <div class="col col-lg-4 col-12">
                                    <div class="titleinfo">
                                        <i class="fa-regular fa-hand-point-down"></i>
                                        <span>Paso 1</span>
                                    </div>
                                    <div class="pasosinfo">
                                        Completar la ficha de admisión 2023.
                                    </div>
                                </div>
                                <div class="col col-lg-4 col-12">
                                    <div class="titleinfo">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                        <span>Paso 2</span>
                                    </div>
                                    <div class="pasosinfo">
                                        Documentos a solicitar: <br>
                                        • Foto nítida por ambos lados del DNI del alumno.<br>
                                        • Foto nítida por ambos lados del DNI del P.F. y/o apoderado.<br>
                                        • Libreta de notas. <br>
                                        • Cartilla de vacunación.
                                    </div>
                                </div>
                                <div class="col col-lg-4 col-12">
                                    <div class="titleinfo">
                                        <i class="fa-regular fa-file"></i>
                                        <span>Paso 3</span>
                                    </div>
                                    <div class="pasosinfo">
                                        • Pago de matrícula. <br>
                                        • Firmar el compromiso de matrícula. <br>
                                        • Completar y firmar la ficha médica del estudiante.
                                    </div>
                                </div>
                                <div class="col col-lg-4 col-12">
                                    <div class="titleinfo">
                                        <i class="fa-regular fa-handshake"></i>
                                        <span>Paso 4</span>
                                    </div>
                                    <div class="pasosinfo">
                                        Se programa entrevista con padres y coordinación o psicóloga.
                                    </div>
                                </div>
                            </div>
                        </div>
                
                        <div data-content id="contacto">
                            <div class="row justify-content-center">
                                <div class="col col-lg-4 col-12">
                                    <div class="titleinfo">
                                        <i class="fa-regular fa-hand-point-down"></i>
                                        <span>Inscripción</span>
                                    </div>
                                    <div class="pasosinfo">
                                        • Actualizar ficha de matrícula.<br>
                                        • Firmar el Compromiso de matrícula.<br>
                                        • Completar y firmar la ficha médica del estudiante.<br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Facts Start -->
<div class="contador my-4" data-parallax="scroll">
<div class="container">
    <div class="box-count row">
        <div class="col col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="container-count">
                <i class="fa-solid fa-user-graduate"></i>
                <div class="contador-text">
                    <h3 class="contador-plus" data-toggle="counter-up">2500</h3>
                    <p>Estudiantes</p>
                </div>
            </div>
        </div>
        <div class="col col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="container-count">
                <i class="fa-solid fa-person-chalkboard"></i>
                <div class="contador-text">
                    <h3 class="contador-plus" data-toggle="counter-up">120</h3>
                    <p>Docentes</p>
                </div>
            </div>
        </div>
        <div class="col col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="container-count">
                <i class="fa-solid fa-person-shelter"></i>
                <div class="contador-text">
                    <h3 class="contador-plus" data-toggle="counter-up">100</h3>
                    <p>Aulas</p>
                </div>
            </div>
        </div>
        <div class="col col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="container-count">
                <i class="fa-solid fa-hands-holding-child"></i>
                <div class="contador-text">
                    <h3 class="contador-star" data-toggle="counter-up">194</h3>
                    <p>Años</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Facts End -->
  @else
  <div class="tuition bg-grey">
    <!-- Facts Start -->
    <h4  hidden class="fw-bold" id="tmat">Matrícula 2023</h4>
<div class="contador my-4" data-parallax="scroll">
    <div class="container">
        <div class="box-count row">
            <div class="col col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="container-count">
                    <i class="fa-solid fa-user-graduate"></i>
                    <div class="contador-text">
                        <h3 class="contador-plus" data-toggle="counter-up">2500</h3>
                        <p>Estudiantes</p>
                    </div>
                </div>
            </div>
            <div class="col col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="container-count">
                    <i class="fa-solid fa-person-chalkboard"></i>
                    <div class="contador-text">
                        <h3 class="contador-plus" data-toggle="counter-up">120</h3>
                        <p>Docentes</p>
                    </div>
                </div>
            </div>
            <div class="col col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="container-count">
                    <i class="fa-solid fa-person-shelter"></i>
                    <div class="contador-text">
                        <h3 class="contador-plus" data-toggle="counter-up">100</h3>
                        <p>Aulas</p>
                    </div>
                </div>
            </div>
            <div class="col col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="container-count">
                    <i class="fa-solid fa-hands-holding-child"></i>
                    <div class="contador-text">
                        <h3 class="contador-star" data-toggle="counter-up">194</h3>
                        <p>Años</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>


  @endif
    


  <div class="causes my-4">
    <div class="container">
        <div class="section-header text-center">
            <p>Ultimas Noticias</p>
            <h2>EVENTOS Y COMUNICADOS</h2>
        </div>
        <div class="owl-carousel causes-carousel">
            @foreach ($noticias as $noticia)
            <div class="causes-item">
                <form action="{{route('noticia.show', $noticia)}}" method="GET">
                <div class="causes-image">
                    @foreach ($imagenes as $imagen)
                    @if ($noticia->id == $imagen->noticia_id)
                        <img src="{{asset($imagen->url)}}"> 
                        @break;
                    @endif
                    @endforeach
                </div>
                <div class="causes-title my-2">
                    <h6>{{$noticia->titulo}}</h6>
                </div>
                <div class="causes-description my-2">
                    <p>{{$noticia->shortdescripcion}}</p>
                </div>
                <div class="causes-date">
                    <span class="text-muted">{{$noticia->fpublicacion}}</span>
                </div>
                <div class="causes-btn">
                    <div class="wrap">
                        <button type="submit"  class="button">Leer Más</button> 
                    </div>
                </div>
                </form>
            </div>
            @endforeach
        </div>
        <div class="causes-btn">
            <div class="wrap">
                <form action="{{route('home.noticia.show')}}" method="GET">
                    <button type="submit" class="button">Ver Todas Las Noticias</button>
                </form>
            </div>
        </div>
    </div>
  </div>

  

    <div class="my-4">
        <div class="container">
            <div class="location">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4679.263660853606!2d-77.52846528395543!3d-9.528177421796917!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91a90d0e4e367f89%3A0x62fd8a3d8a536270!2sColegio%20La%20Libertad%2C%20Av.%20Agust%C3%ADn%20Gamarra%2C%20Huaraz%2002001!5e0!3m2!1ses-419!2spe!4v1676324219759!5m2!1ses-419!2spe" width="100%" height="450" style="border:0; border-radius: 20px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
    
@endsection



@section('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script>
    $(document).ready(function () {
    var today = new Date();
    var year = today.getFullYear();
    
    // muestra la fecha de hoy en formato `MM/DD/YYYY`
    const tmat = document.getElementById('tmat');
    tmat.textContent='Matrícula '+year;
   


    const myModal = new bootstrap.Modal('#exampleModal1', {
  keyboard: false
});
    const modalToggle = document.getElementById('exampleModal1'); 
    myModal.show(modalToggle);
   });
</script>

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