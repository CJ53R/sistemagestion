@extends('layouts.home.app')

@section('title', 'Director')

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
            <div class="col col-lg-6 col-md-6 col-sm-12 col-12 text-center">
              @foreach ($directores as $director)
              <div class="contenedor-title text-center">
                @if ($director->genero_id=='2')
                  <span class="cargo">DIRECTOR</span>
                @else
                  <span class="cargo">DIRECTORA</span>
                @endif
                <span class="name">{{mb_strtoupper($director->name)}}</span>
                @if ($director->nivsec!='')
                <span class="nivel">{{mb_strtoupper($director->nivsec)}}</span>
                @endif
              </div>
              <div class="contenedor-img">
                @if ($director->url!='')
                <img src="{{asset($director->url)}}" onclick="abrirVista(this.src)" alt="">
                @else
                <img src="{{asset('../resources/img/director.jpg')}}" onclick="abrirVista(this.src)" alt="">
                @endif
              </div>
              @endforeach
            </div>
            <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
              <div class="contenedor-text">
                <h4 class="fw-bold text-center">MISIÓN DEL CARGO</h4>
                <p>Liderar, supervisar y evaluar la gestión escolar y técnico productiva de la institución educativa a su cargo, 
                mediante el aseguramiento de condiciones operativas, la supervisión y monitoreo del desempeño de los procesos 
                pedagógicos, con el fin de garantizar el acceso, permanencia, culminación de la trayectoria escolar y posterior 
                inserción laboral de los estudiantes asegurando la calidad del servicio educativo, la integridad físico-emocional 
                de todos los estudiantes, el respeto a la diversidad y la mejora de los aprendizajes, en el marco del Currículo 
                Nacional de Educación Básica.</p>  
                <hr class="separador">    
                <h4 class="fw-bold mt-4 text-center">FUNCIONES PRINCIPALES</h4>
                <p>1. Dirigir el diseño, implementación, seguimiento y evaluación de la planificación institucional de la Institución Educativa de
                   manera participativa, a través de la organización institucional, a fin de contar con instrumentos de gestión escolar que respondan 
                   a un diagnóstico de las características de su población educativa, entorno y demandas del mercado laboral, de acuerdo a la etapa 
                   o ciclo del sistema educativo Conducir el proceso de diversificación curricular, en coordinación con los docentes y personal 
                   especializado y con la participación de la comunidad educativa, a fin de cumplir con los lineamientos de la Política Curricular 
                   Nacional de Educación Básica o los Lineamientos Académicos Generales para los Centros de Educación Técnico Productiva en articulación 
                   con la propuesta curricular regional y local.</p>
                  <p>2. Conducir la gestión de los procesos pedagógicos de los servicios educativos de la Institución Educativa, así como establecer 
                    alianzas estratégicas orientadas al desarrollo de experiencias formativas para estudiantes y capacitación docente, a fin asegurar 
                    el fortalecimiento de las capacidades de los docentes y la calidad del servicio educativo.</p>
                  <p>3. Gestionar el uso del tiempo, recursos materiales y financieros de la institución educativa, a través de la conducción y supervisión
                     de acciones administrativas, de soporte y de los servicios complementarios, a fin de contar con condiciones operativas que aseguren aprendizajes de calidad.</p>
                  <p>4. Gestionar el uso del tiempo, recursos materiales y financieros de la institución educativa, a través de la conducción y supervisión 
                    de acciones administrativas, de soporte y de los servicios complementarios, a fin de contar con condiciones operativas que aseguren aprendizajes de calidad.</p>
                    <p>5. Dirigir e implementar acciones para el desarrollo de estrategias de prevención y atención a la violencia, a fin de garantizar 
                      el bienestar y desarrollo integral de los estudiantes y fortalecer el clima en la Institución Educativa; en un entorno de convivencia 
                      democrática, inclusiva e intercultural.</p>         
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