@extends('layouts.home.app')

@section('title', 'Jefes de Laboratio')

@section('css')
<link rel="stylesheet" href="{{asset('../resources/css/home/director.css')}}">
@endsection



@section('content')

<div class="tuition bg-lig py-4">
    <div class="container">
        <div class="row justify-content-center cont">
          <div class="modal-img" id="cont-modal-img">
            <img src="{{asset('../resources/img/img_3.jpg')}}" id="imgre" alt="">
            <span onclick="cerrarVista()">X</span>
          </div>
          <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
            <h3 class="fw-bold t-principal">JEFES DE LABORATORIO</h3>
          </div>
          <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="row justify-content-center">
              @foreach ($bjefes as $bjefe)
              <div class="col col-lg-4 col-md-4 col-sm-12 col-12 text-center">
                <div class="contenedor-title text-center">
                  <span class="name">{{mb_strtoupper($bjefe->name)}}</span>
                  <span class="cargo">{{mb_strtoupper($bjefe->nombretipousuario)}}</span>
                </div>
                <div class="contenedor-img">
                  @if ($bjefe->url!='')
                  <img src="{{asset($bjefe->url)}}" onclick="abrirVista(this.src)" alt="">
                  @else 
                  <img src="{{asset('../resources/img/sd_1.jpg')}}" onclick="abrirVista(this.src)" alt="">
                  @endif
                </div>
              </div>
              @endforeach

              @foreach ($fjefes as $fjefe)
              <div class="col col-lg-4 col-md-4 col-sm-12 col-12 text-center">
                <div class="contenedor-title text-center">
                  <span class="name">{{mb_strtoupper($fjefe->name)}}</span>
                  <span class="cargo">{{mb_strtoupper($fjefe->nombretipousuario)}}</span>
                </div>
                <div class="contenedor-img">
                  @if ($fjefe->url!='')
                  <img src="{{asset($fjefe->url)}}" onclick="abrirVista(this.src)" alt="">
                  @else 
                  <img src="{{asset('../resources/img/sd_1.jpg')}}" onclick="abrirVista(this.src)" alt="">
                  @endif
                </div>
              </div>
              @endforeach

              @foreach ($qjefes as $qjefe)
              <div class="col col-lg-4 col-md-4 col-sm-12 col-12 text-center">
                <div class="contenedor-title text-center">
                  <span class="name">{{mb_strtoupper($qjefe->name)}}</span>
                  <span class="cargo">{{mb_strtoupper($qjefe->nombretipousuario)}}</span>
                </div>
                <div class="contenedor-img">
                  @if ($qjefe->url!='')
                  <img src="{{asset($qjefe->url)}}" onclick="abrirVista(this.src)" alt="">
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
                <h4 class="fw-bold text-center">MISI??N DEL CARGO</h4>
                <p>Es el responsable de organizar, coordinar, orientar, supervisar y evaluar el proceso de ense??anza-aprendizaje en el laboratorio.
                   Depende de la Subdirecci??n de formaci??n general.</p>        
              </div>
            </div>
            <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
              <div class="contenedor-text">
                <h4 class="fw-bold text-center">FUNCIONES PRINCIPALES</h4>
                <p>1. Participa de la adaptaci??n, implementaci??n y evaluaci??n de los instrumentos de gesti??n de la IE.</p>
                <p>2. Gestiona actividades, como reuniones de trabajo colegiado u otros, con los integrantes de la modalidad y nivel a su cargo, seg??n
                   sus respectivos roles para el adecuado desarrollo del periodo lectivo.</p>
                <p>3. Desarrolla acciones de seguimiento a la labor que desarrollan los docentes a su cargo, propiciando la mejora de los aprendizajes.</p>
                <p>4. Desarrolla con los docentes a su cargo diversas estrategias de trabajo colegiado u otras acciones que se dispongan para la
                     mejora del servicio educativo y de la calidad de la ense??anza.</p>  
                <P>5. Identifica y consolida los resultados obtenidos a partir del trabajo colegiado proponiendo mejoras a los docentes.</P>
                <P>6. Participa de acciones que promueven el buen trato entre todos los integrantes de la comunidad educativa.</P>  
                <P>7. Desarrolla acciones con sus estudiantes para el buen trato y una convivencia democr??tica, con respeto de la diversidad, 
                  la equidad y la eliminaci??n de toda forma de violencia y discriminaci??n.</P>   
                <P>8. Identifica y comunica al equipo directivo las necesidades pedag??gicas de los docentes para la mejora del trabajo remoto.</P>
                <P>9. Identifica y comunica al equipo directivo las buenas pr??cticas pedag??gicas desarrolladas por los docentes a su cargo.</P>
                <P>10. Cumplir con administrar el uso de los equipos e insumos del laboratorio.</P>
                <P>11. Contar con la documentaci??n actualizada sobre el uso del Laboratorio por los profesores del ??rea.</P>
                <P>12. Garantizar la realizaci??n de las actividades/ferias/concursos relacionadas al ??rea de Ciencia y Tecnolog??a.</P>
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
              title: "??Uy!",
              text: "??Datos no encontrados!",
              icon: "error",
              button: "OK!",
            });
</script>
@endif
@endsection