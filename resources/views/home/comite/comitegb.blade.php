@extends('layouts.home.app')

@section('title', 'Comite de Gestión de Bienestar')

@section('css')
<link rel="stylesheet" href="{{asset('../resources/css/home/comite.css')}}">
@endsection



@section('content')
<header id="contenedor-portada"  style="background: url('{{asset($imagenp->url)}}'); background-size: cover; background-repeat: no-repeat;background-position: center;">
  <div id="portada-text">
    <div class="container">
      <h1 class="title-portada">COMITÉ DE GESTIÓN DE BIENESTAR</h1>
    </div>
  </div>
</header>

<div class="tuition bg-lig py-4">
  <div class="container">
    <div class="row justify-content-center cont">
        <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
          <div class="contenedor-text">
            <h4 class="fw-bold text-center">MISIÓN</h4>
            <p>Gestiona las prácticas vinculadas al CGE 5, tales como la generación de acciones y espacios para el acompañamiento socioafectivo y cognitivo,
               la gestión de la convivencia escolar, la participación democrática del personal de la IE y de las y los estudiantes en decisiones clave, la 
               participación de las familias en la elaboración de los instrumentos de gestión, la disciplina con enfoque de derechos, la promoción de una 
               cultura inclusiva que valore la diversidad, la atención a situaciones de conflicto o violencia, la prevención de casos de violencia, la promoción
                del bienestar, etc. Concentra funciones y competencias ligadas a la gestión de espacios de participación, elaboración participativa y difusión 
                de las normas de convivencia de la I.E., gestión de la prevención de la violencia escolar, atención oportuna a casos de violencia, restitución 
                de la convivencia y resolución de conflictos y gestión de la red institucional de protección junto con otras instituciones.</p>
                
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
            <p>1. Participar en la elaboración, actualización, implementación y evaluación de los instrumentos de gestión de la institución educativa, 
              contribuyendo a una gestión del bienestar escolar que promueva el desarrollo integral de las y los estudiantes.</p>
            <p>2. Elaborar, ejecutar y evaluar las acciones de Tutoría, Orientación Educativa y Convivencia Escolar, las cuales se integran a los Instrumentos de Gestión.</p>
            <p>3. Desarrollar actividades y promover el uso de materiales educativos de orientación a la comunidad educativa relacionados a la promoción del bienestar
               escolar, de la Tutoría, Orientación Educativa y Convivencia Escolar democrática e intercultural y de un clima escolar positivo e inclusivo, con enfoque de atención a la diversidad.</p>
            <p>4. Contribuir en el desarrollo de acciones de prevención y atención oportuna de casos de violencia escolar y otras situaciones de vulneración de derechos
               considerando las orientaciones y protocolos de atención y seguimiento propuesto por el Sector, en coordinación con los actores de la comunidad educativa 
               correspondientes.</p>  
            <P>5. Promover reuniones de trabajo colegiado y grupos de interaprendizaje para planificar, implementar y evaluar las acciones de Tutoría, Orientación Educativa y Convivencia
               Escolar con las y los tutores, docentes, auxiliares de educación y actores socioeducativos de la IE.</P>
            <P>6. Articular acciones con instituciones públicas y privadas, autoridades comunales y locales, con el fin de consolidar una red de apoyo a la Tutoría
               y Orientación Educativa y a la promoción de la convivencia escolar, así como a las acciones de prevención y atención de la violencia, y casos críticos
                que afecten el bienestar de las y los estudiantes.</P>  
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