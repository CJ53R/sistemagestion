@extends('layouts.home.app')

@section('title', 'Comite de Gestión Pedagógica')

@section('css')
<link rel="stylesheet" href="{{asset('../resources/css/home/comite.css')}}">
@endsection



@section('content')
<header id="contenedor-portada"  style="background: url('{{asset($imagenp->url)}}'); background-size: cover; background-repeat: no-repeat;background-position: center;">
  <div id="portada-text">
    <div class="container">
      <h1 class="title-portada">COMITÉ DE GESTIÓN PEDAGÓGICA</h1>
    </div>
  </div>
</header>

<div class="tuition bg-lig py-4">
  <div class="container">
    <div class="row justify-content-center cont">
        <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
          <div class="contenedor-text">
            <h4 class="fw-bold text-center">MISIÓN</h4>
            <p>Gestiona las prácticas vinculadas al CGE 4, tanto aquellas orientadas a promover el aprendizaje y desarrollo profesional de los docentes,
               así como aquellas orientadas al diseño, implementación y organización de los procesos de enseñanza y aprendizaje. Concentra funciones y 
               competencias ligadas a la organización de espacios de interaprendizaje profesional y de trabajo colegiado, el monitoreo y acompañamiento 
               de la práctica docente, el desarrollo profesional docente, la planificación y adaptación curricular, la evaluación de los aprendizajes, 
               el monitoreo del progreso de las y los estudiantes a lo largo del año y la calendarización del tiempo lectivo.</p>
                
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
        <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
          <div class="contenedor-text">
            <h4 class="fw-bold text-center">FUNCIONES</h4>
            <p>1. Participar en la elaboración, actualización, implementación y evaluación de los instrumentos de gestión de la institución educativa, contribuyendo a 
              orientar la gestión de la IE al logro de los aprendizajes previstos en el CNEB.</p>
            <p>2.Propiciar la generación de Comunidades de Aprendizaje para fortalecer las prácticas pedagógicas y de gestión, considerando las necesidades y 
              características de los estudiantes y el contexto donde se brinda el servicio educativo.</p>
            <p>3.  Generar espacios de promoción de la lectura, de interaprendizaje (entre pares) y de participación voluntaria en los concursos y actividades 
              escolares promovidos por el MINEDU, asegurando la accesibilidad para todas y todos los estudiantes.</p>
            <p>4. Desarrollar los procesos de convalidación, revalidación, prueba de ubicación de estudiantes, reconocimiento de estudios independientes, y 
              supervisar las acciones para la recuperación pedagógica, tomando en cuenta la atención a la diversidad.</p>  
            <P>5. Promover el uso pedagógico de los recursos y materiales educativos, monitoreando la realización de las adaptaciones necesarias para garantizar
               su calidad y pertinencia a los procesos pedagógicos y la atención de la diversidad.</P>
            <P>6. Promover Proyectos Educativos Ambientales Integrados (PEAI) que contengan las acciones orientadas a la mejora del entorno educativo y al logro
               de aprendizajes, en atención a la diversidad, asegurando su incorporación en los Instrumentos de Gestión.</P>
            <p>7. Promover el desarrollo de las prácticas de gestión asociadas al Compromiso de Gestión Escolar 4.</p>
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