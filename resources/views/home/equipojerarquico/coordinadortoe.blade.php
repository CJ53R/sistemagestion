@extends('layouts.home.app')

@section('title', 'Coordinadores de TOE')

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
            <h3 class="fw-bold t-principal">COORDINADORES DE TUTORÍA Y ORIENTACIÓN EDUCATIVA</h3>
          </div>
          <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="row justify-content-center">
              @foreach ($coordinadores as $coordinador)
              <div class="col col-lg-4 col-md-4 col-sm-12 col-12 text-center">
                <div class="contenedor-title text-center">
                  <span class="name">{{mb_strtoupper($coordinador->name)}}</span>
                </div>
                <div class="contenedor-img">
                  @if ($coordinador->url!='')
                  <img src="{{asset($coordinador->url)}}" onclick="abrirVista(this.src)" alt="">
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
                <p>Responsable de las acciones de apoyo y acompañamiento de la Atención Tutorial Integral (ATI) dirigida a los estudiantes. 
                  Se encarga de dirigir, coordinar y acompañar el desarrollo de la acción tutorial bajo un enfoque orientador y preventivo, 
                  garantizando la atención y orientación oportuna y pertinente de las inquietudes y expectativas de los estudiantes para su 
                  desarrollo personal en el marco de una convivencia democrática e intercultural.</p>        
              </div>
            </div>
            <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
              <div class="contenedor-text">
                <h4 class="fw-bold text-center">FUNCIONES PRINCIPALES</h4>
                <p>1. Participa de la adaptación, implementación y evaluación de los instrumentos de gestión de la IE.</p>
                <p>2. Gestiona actividades, como reuniones de trabajo colegiado u otros, con los integrantes de la modalidad y nivel a su 
                  cargo, según sus respectivos roles para el adecuado desarrollo del periodo lectivo.</p>
                <p>3. Desarrolla acciones de seguimiento a la labor que desarrollan los docentes a su cargo, propiciando la mejora de los aprendizajes.</p>
                <p>4. Desarrolla con los docentes a su cargo diversas estrategias de trabajo colegiado u otras acciones que se dispongan
                     para la mejora del servicio educativo y de la calidad de la enseñanza.</p>       
                <p>5. Identifica y consolida los resultados obtenidos a partir del trabajo colegiado proponiendo mejoras a los docentes.</p>
                <p>6. Participa de acciones que promueven el buen trato entre todos los integrantes de la comunidad educativa.</p>
                <p>7. Desarrolla acciones con sus estudiantes para el buen trato y una convivencia democrática, con respeto de la diversidad, la 
                  equidad y la eliminación de toda forma de violencia y discriminación.</p>
                <p>8. Identifica y comunica al equipo directivo las necesidades pedagógicas de los docentes para la mejora del trabajo remoto.</p>
                <p>9. Identifica y comunica al equipo directivo las buenas prácticas pedagógicas desarrolladas por los docentes a su cargo.</p>
                <p>10. Asegurar el cumplimiento del Plan de Tutoría de la IE.</p>
                <p>11. Cumplir con la ejecución de jornadas de atención a padres de familia por grado y/o colectivas.</p>
                <p>12. Cumplir con la ejecución de las reuniones del Comité de Tutoría y Orientación Educativa.</p>
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