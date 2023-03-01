@extends('layouts.home.app')

@section('title', 'Sub Dirección Primaria')

@section('css')
<link rel="stylesheet" href="{{asset('../resources/css/home/director.css')}}">
@endsection



@section('content')

<div class="tuition bg-lig py-4">
    <div class="container">
        <div class="row justify-content-center cont">
          <div class="modal-img" id="cont-modal-img">
            <img src="{{asset('../resources/img/img_1.jpg')}}" id="imgre" alt="">
            <span onclick="cerrarVista()">X</span>
          </div>
          <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
            <h3 class="fw-bold t-principal">SUB DIRECCION DE PRIMARIA</h3>
          </div>
            <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="row justify-content-center">
                @foreach ($subdirectores as $subdirector)
                <div class="col col-lg-4 col-md-4 col-sm-12 col-12 text-center">
                  <div class="contenedor-title text-center">
                    <span class="name">{{mb_strtoupper($subdirector->name)}}</span>
                    <span class="cargo">{{mb_strtoupper($subdirector->nivsec)}}</span>
                  </div>
                  <div class="contenedor-img">
                    @if ($subdirector->url!='')
                    <img src="{{asset($subdirector->url)}}" onclick="abrirVista(this.src)" alt="">
                    @else 
                    <img src="{{asset('../resources/img/sd_1.jpg')}}" onclick="abrirVista(this.src)" alt="">
                    @endif
                  </div>
                </div>
                @endforeach
              </div>
            </div>
            <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
              <div class="contenedor-text">
                <h4 class="fw-bold text-center">MISIÓN DEL CARGO</h4>
                <p>Liderar y orientar el proceso de enseñanza y aprendizaje del nivel(es) y/o modalidad a su cargo, asignado por el director,
                   así como la identificación de necesidades y gestión de recursos educativos, a fin de promover la mejora del nivel(es) 
                   y/o modalidad a su cargo, garantizando la integridad físico-emocional de todos los estudiantes, el respeto a la diversidad 
                   y la mejora de los aprendizajes, en el marco del Currículo Nacional de Educación Básica o los Lineamientos Académicos 
                   Generales para los Centros de Educación Técnico Productiva, según corresponda.</p>        
              </div>
            </div>
            <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
              <div class="contenedor-text">
                <h4 class="fw-bold text-center">FUNCIONES PRINCIPALES</h4>
                <p>1. Organizar y elaborar, de manera participativa, el diagnóstico y formulación de objetivos, metas y actividades del nivel y/o 
                  modalidad a su cargo, a fin de contribuir y participar de la Planificación Institucional y contar con instrumentos de gestión 
                  escolar concordantes con las características de su población educativa y entorno.</p>
                  <p>2. Monitorear el proceso de enseñanza - aprendizaje y acompañar a los docentes del nivel(es) y/o modalidad a su cargo en el 
                    desarrollo de estrategias, adaptaciones curriculares y recursos metodológicos, así como en el uso de material educativo, en 
                    articulación con las acciones formativas que se implementen en la Institución Educativa, a fin de fortalecer su desempeño y
                     asegurar la calidad e impacto en el logro de las metas de aprendizaje de los estudiantes.</p>
                  <p>3. Organizar y promover espacios y mecanismos de trabajo colaborativo en la comunidad profesional de aprendizaje de docentes 
                    de su nivel(es) y/o modalidad, a fin de mejorar su práctica pedagógica y estimular el emprendimiento, la innovación e investigación educativa.</p>
                  <p>4. Analizar y sistematizar resultados y logros en las metas de aprendizaje de los estudiantes del nivel(es) y/o modalidad a su cargo,
                     a fin de reflexionar sobre la práctica pedagógica docente y otros factores influyentes e implementar acciones que conduzcan a su mejora.</p>       
              </div>
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