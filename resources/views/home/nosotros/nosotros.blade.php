@extends('layouts.home.app')

@section('title', 'Nosotros')

@section('css')
<link rel="stylesheet" href="{{asset('../resources/css/home/nosotros.css')}}">
<link rel="stylesheet" href="{{asset('../resources/css/home/comite.css')}}">
@endsection



@section('content')
<header id="contenedor-portada"  style="background: url('{{asset($imagenp->url)}}'); background-size: cover; background-repeat: no-repeat;background-position: center;">
  <div id="portada-text">
    <div class="container">
      <h1 class="title-portada">EDUCACIÓN PARA EL MAÑANA</h1>
    </div>
  </div>
</header>
<div class="tuition bg-lig py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col col-lg-6 col-md-6 col-sm-6 col-12 text-center contenido mt-4">
              <h4>NUESTRA MISIÓN</h4>
              <div class="cont-parra">
                <p>Lograr que todas y todos los estudiantes culminen la escolaridad en los niveles de primaria y secundaria de Educación
                    Básica Regular, consoliden los aprendizajes establecidos en el perfil de egreso del currículo nacional y alcancen su 
                    desarrollo integral en espacios seguros, inclusivos, de sana convivencia y libres de violencia.</p>
              </div>
            </div>

            <div class="col col-lg-6 col-md-6 col-sm-6 col-12 text-center contenido mt-4">
              <h4>NUESTRA VISIÓN</h4>
              <div class="cont-parra">
                <p>Al <span id="anio"></span>, ser reconocidos como una institución educativa que forma estudiantes competentes, que desarrollan una vida
                   saludable, practican valores, respetuosos de la diversidad sociocultural y conciencia ambiental; con capacidades 
                   críticas, creativas, reflexivas, emprendedoras y cultura digital; para enfrentar los desafíos en una sociedad 
                   democrática de manera autónoma y asertiva; con una comunidad educativa comprometida en la búsqueda de la excelencia y del bien común.</p>
              </div>
            </div>

            <div class="col col-lg-12 col-md-12 col-sm-12 col-12  text-center contenido mt-4">
              <h4>PRINCIPIOS EDUCATIVOS</h4>
              <div class="cont-parra">
                <p><b>1. La calidad, </b>que asegure la eficiencia en los procesos y eficacia en los logros y las mejores Condiciones
                de una educación para la identidad, la cudadanía, el trabajo; en un marco de formación permanente.</p>

                <p><b>2. La equidad </b>que posibilte una buena educación para todos los peruanos sin exclusión de ningún tipo y que 
                dé prioridad a los que menos oportunidades tienen.</p>

                <p><b>3. La interculturalidad, </b>que contribuya al reconocimiento y valoración de nuestra diversidad cultural, étnica y lingüística; 
                al diálogo e intercambio entre las distintas culturas y al establecimiento de relaciones armoniosas.</p>

                <p><b>4. La democracia, </b>que permita educar en y para la tolerancia, el respeto a los derechos humanos, el ejercicio de 
                la identidad y la conciencia ciudadana, asi como la participación.</p>

                <p><b>5. La ética, </b>que fortalezca los valores el respeto a las normas de convivencia y la conciencia moral, individual y pública.</p>

                <p><b>6. La inclusión, </b>que incorpore a las personas con discapacidad, grupos sociales excluidos, marginados y vulnerables.</p>

                <p><b>7. La conciencia ambiental, </b>que motive el respeto, cuidado y conservación del entorno natural como garantía para el futuro de la vida.</p>

                <p><b>8. La creatividad y la innovación, </b>que promuevan la producción de nuevos conocimientos en todos los campos del saber, el arte y la cultura.</p>

                <p><b>9. La igualdad de género, </b>que es un principio constitucional que estipula que hombres y mujeres son iguales ante la
                  ley, lo que significa que todas las personas, sin distingo alguno tenemos los mismos derechos y deberes frente al estado y la sociedad en su conjunto.</p>

                  <p><b>10. El desarrollo sostenible, </b>que se basa en tres factores: sociedad, economía y medio ambiente. En el informe de Brundtland, se define como sigue: Satisfacer
                   las necesidades de las generaciones presentes sin comprometer las posibilidades de las generaciones del futuro para atender sus propias necesidades.</p>

                <div class="row justify-content-center">
                  <div class="col col-lg-6 col-md-6 col-sm-6 col-12 text-center mt-4">
                    <span class="fw-bold">LEY GENERAL DE EDUCACIÓN N° 28044</span>
                    
                  </div>
                  <div class="col col-lg-6 col-md-6 col-sm-6 col-12 text-center contenido mt-4">
                    <img src="{{asset('../resources/img/escudo_himno.png')}}" class="escudo" alt=""> <br>
                    <span>"Ser Libertano es Compromiso de Honor"</span>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection



@section('script')

<script>
  var today = new Date();
    var year = today.getFullYear();
    
    // muestra la fecha de hoy en formato `MM/DD/YYYY`
    const anio = document.getElementById('anio');
    anio.textContent=1+year;
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