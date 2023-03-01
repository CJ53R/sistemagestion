@extends('layouts.home.app')

@section('title', 'Comité de Gestión de Condiciones Operativas')

@section('css')
<link rel="stylesheet" href="{{asset('../resources/css/home/comite.css')}}">
@endsection



@section('content')
<header id="contenedor-portada" style="background: url('{{asset($imagenp->url)}}'); background-size: cover; background-repeat: no-repeat;background-position: center;">
  <div id="portada-text">
    <div class="container">
      <h1 class="title-portada">COMITÉ DE GESTIÓN DE CONDICIONES OPERATIVAS</h1>
    </div>
  </div>
</header>

<div class="tuition bg-lig py-4">
  <div class="container">
    <div class="row justify-content-center cont">
        <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
          <div class="contenedor-text">
            <h4 class="fw-bold text-center">MISIÓN</h4>
            <p>Gestiona las prácticas vinculadas al CGE 3, tales como: la matrícula, la asistencia de estudiantes y del personal de la I.E., los riesgos
               cotidianos, de emergencias y desastres, el mantenimiento del local, el funcionamiento adecuado del quiosco, cafetería o comedor escolar, 
               según sea el caso y de acuerdo a la normatividad vigente, las intervenciones de acondicionamiento, el inventario y la distribución de materiales
                y recursos educativos, el acceso a la comunicación (lenguas originarias, lengua de señas peruana u otras) y la provisión de apoyos educativos 
                que se requieran en un marco de atención a la diversidad, etc. Concentra funciones y competencias ligadas al desarrollo de capacidades para 
                gestión del riesgo (a través del uso de dispositivos de seguridad, señaléticas, extintores, botiquines, tablas rígidas, megáfono, baldes con 
                arena, etc.), logística, gestión financiera, contratación, mantenimiento del local y de los materiales, inventario, entre otros. Asimismo, en 
                caso de que la IE cuente con personal administrativo, las responsabilidades asumidas por este comité deben estar articuladas con las acciones 
                que dicho personal viene ejecutando como parte de sus funciones de apoyo a la gestión escolar.</p>
                
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
            <p>Participar en la elaboración, actualización, implementación y evaluación de los instrumentos de gestión de la institución educativa, contribuyendo al 
              sostenimiento del servicio educativo.</p>
            <p>1. Implementar los procesos de recepción, registro, almacenamiento, distribución (cuando corresponda) e inventario de los recursos educativos de la 
              institución educativa, así como aquellos otorgados por entidades externas a la IE, verificando el cumplimiento de los criterios de asignación y gestión 
              según la normativa vigente.</p>
            <p>2. Elaborar, implementar y evaluar el Plan de Gestión del Riesgo de Desastres según la normativa vigente, así como la implementación de simulacros 
              sectoriales programados o inopinados.</p>
            <p>3. Reportar los incidentes sobre afectación y/o exposición de la IE por peligro inminente, emergencia y/o desastre, así como las necesidades y las 
              acciones ejecutadas a las instancias correspondientes según la normativa vigente.</p>
            <p>4. Realizar el diagnóstico de necesidades de infraestructura del local educativo, incluyendo las de mantenimiento, acondicionamiento, así como 
              aquellas relacionadas al Plan de Gestión de Riesgos de Desastres.</p>  
            <P>5. Realizar la programación y ejecución de las acciones de mantenimiento y acondicionamiento priorizadas bajo la modalidad de subvenciones, según 
              la normativa vigente y las necesidades identificadas.</P>
            <P>6. Actualizar la información en los sistemas informáticos referidos a la gestión de condiciones operativas a fin de que, a través de los mismos, 
              se pueda cumplir con las funciones a cargo del Comité, registrar la matrícula oportuna, así como atender los reportes solicitados por las personas 
              y/o entidades que lo requieran.</P>  
            <P>7. Formular e incorporar en el Plan Anual de Trabajo, las acciones, presupuesto asociado, personal a cargo y otros aspectos vinculados a la 
              gestión de recursos propios y actividades productivas y empresariales u otros ingresos obtenidos o asignados a la IE, en concordancia con las 
              prioridades definidas en los IIGG.</P>
            <p>8. Rendir cuentas sobre los recursos financieros obtenidos o asignados a la IE, ante el CONEI, la comunidad educativa y/o la UGEL, de forma 
              semestral o según la normativa vigente.</p> 
            <p>9. Implementar el proceso de adjudicación de quioscos, cafeterías y comedores escolares, que incluye la elaboración y difusión del cronograma y
               las bases, la absolución de consultas, la evaluación de las propuestas técnicas y la adjudicación del o los quioscos, cafeterías y comedores 
               escolares, garantizando la transparencia del proceso en conformidad con las bases establecidas.</p>
            <p>10. Supervisar el funcionamiento de los quioscos, cafeterías y comedores escolares, la calidad del servicio ofrecido, la administración 
              financiera del mismo, así como sancionar el incumplimiento de cualquier acuerdo extendido al momento de la adjudicación de acuerdo con las 
              cláusulas del contrato y la gravedad de la falta.</p>
            <p>11. Implementar el proceso de racionalización a nivel de la institución educativa para plazas de personal docente, directivo, jerárquico, auxiliar
               de educación y administrativo, conforme a los procedimientos e indicadores establecidos en la normativa vigente.</p>
            <p>12. Formular la propuesta del cuadro de horas pedagógicas de acuerdo al número de secciones aprobado y a los criterios de la normativa vigente, 
              presentarlo ante la UGEL/DRE e incorporar los ajustes solicitados, de corresponder, hasta su validación.</p>
            <p>13. Implementar las actividades establecidas para el proceso de contratación de personal administrativo y profesionales de la salud en la 
              institución educativa, de acuerdo a su competencia, según la normativa vigente.</p>
            <p>14. Promover el desarrollo de las prácticas de gestión asociadas al Compromiso de Gestión Escolar 3.</p>
            <p>Las funciones 10, 12, 13 y 14, referidas al proceso de adjudicación de quioscos, cafeterías y comedores, de racionalización, a la formulación 
              del cuadro de horas pedagógicas y al proceso de contratación de personal administrativo y de salud, obedecen a la realización de actividades 
              específicas y, por tanto, culminan con el logro de sus objetivos, en los casos en que correspondan.</p>
            <p>Para la implementación del proceso de racionalización (función 12) y formulación y aprobación del cuadro de horas pedagógicas (función 13) solo participan 
              los integrantes del Comité de Gestión de Condiciones Operativas, a quienes la normativa vigente sobre dichos temas asigne roles y/o funciones.</p>
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