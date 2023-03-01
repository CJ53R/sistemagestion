@extends('layouts.home.app')

@section('title', 'Nuestra Historia')

@section('css')
<link rel="stylesheet" href="{{asset('../resources/css/home/historia.css')}}">
@endsection



@section('content')

<div class="tuition bg-lig py-4">
    <div class="container">
        <div class="title-history text-center">
            <h2 class="fw-bold">NUESTRA HISTORIA</h2>
        </div>
        <div class="row">
            <button class="button fw-bold active" data-target="#inicio">1828<i class="fa-regular fa-hand-point-up"></i></button>
            <button class="button fw-bold" data-target="#productos">1928<i class="fa-regular fa-hand-point-up"></i></button>
            <button class="button fw-bold" data-target="#contacto">1970<i class="fa-regular fa-hand-point-up"></i></button>
            <button class="button fw-bold" data-target="#history4"><span id="anio2"></span><i class="fa-regular fa-hand-point-up"></i></button>
            <hr class="separator">
            <div class="col col-lg-12 contentinfo">
                <div data-content id="inicio" class="active">
                    <div class="row justify-content-center align-items-center">
                        <div class="col col-lg-6 col-12">
                            <div class="history-text">
                                <p>La creación de la Institución Educativa Emblemática “Colegio de La Libertad” alma mater de la cultura ancashina data de los primeros años de nuestra vida republicana, El 25 de enero de 1828, el presbítero Julián de Morales y Maguiña; como diputado por la provincia de Huaylas, propuso ante el Congreso Constituyente del Perú, la creación del Colegio de Artes y Ciencias en la ciudad de Huaraz. La propuesta fue aprobada el 30 de enero de 1828, con el nombre “COLEGIO DE LA LIBERTAD” de Huaraz. Fue promulgado por el Presidente de la República de entonces, Don José de la Mar, el 01 de febrero de 1828; quien dispuso su funcionamiento en el Convento de San Francisco.
                                </p>
                            </div>
                        </div>
                        <div class="col col-lg-6 col-12">
                            <div class="history-image">
                                <img src="{{asset('../resources/img/history_1.jpg')}}" class="d-block w-100"> 
                            </div>
                        </div>
                    </div>
                </div>
        
                <div data-content id="productos">
                    <div class="row justify-content-center align-items-center">
                        <div class="col col-lg-6 col-12">
                            <div class="history-text">
                                <p>Luego de crearse el egregio “COLEGIO DE LA LIBERTAD”, tuvo como primer Rector a don José María Robles Arnao, luego le sucedieron en el cargo don Manuel Castillo y don Julián de Morales y Maguiña. En el año 1928, en las fiestas conmemorativas por el Primer Centenario, se entonó por primera vez, el himno de nuestra institución educativa; escrito por Alejandro Dextre Sierra y la música, por Antonio Guzmán Arenas.
                                </p>
                            </div>
                        </div>
                        <div class="col col-lg-6 col-12">
                            <div class="history-image">
                                <img src="{{asset('../resources/img/history_2.jpg')}}" class="d-block w-100"> 
                            </div>
                        </div>
                    </div>
                </div>
        
                <div data-content id="contacto">
                    <div class="row justify-content-center align-items-center">
                        <div class="col col-lg-6 col-12">
                            <div class="history-text">
                                <p>En sus primeros años, formó ciudadanos con ideales nacionalistas y de liberación; posteriormente, la educación se realizó dentro de los lineamientos de la corriente conductista; con contenidos y métodos propios de una sociedad en vías de industrialización, hasta el año 1969 aproximadamente. A partir del año 1970, se impone el aprendizaje cognoscitivo; luego años más tarde, tiene lugar el enfoque cognitivo que busca el desarrollo de capacidades y valores por medio de metodologías activas.
                                </p>
                                <p>Debido a que la fecha de creación coincide con el período de vacaciones de los estudiantes, el aniversario de nuestra institución no se celebra en el mes de febrero, teniendo como fecha de celebración el 23 de setiembre, fecha reconocida en mérito a la Resolución Directoral N° 5856 del año 1968, que establece como “Día Jubilar del Plantel”, el 23 de setiembre, por gestión del Profesor Teófilo Monroy Solórzano.</p>
                            </div>
                        </div>
                        <div class="col col-lg-6 col-12">
                            <div class="history-image">
                                <img src="{{asset('../resources/img/history_3.jpg')}}" class="d-block w-100"> 
                            </div>
                        </div>
                    </div>
                </div>

                <div data-content id="history4">
                    <div class="row justify-content-center align-items-center">
                        <div class="col col-lg-6 col-12">
                            <div class="history-text">
                                <p>En el presente año escolar <span id="anio"></span>, la Institución Educativa Emblemática “COLEGIO DE LA LIBERTAD” celebra <span id="edad"></span> años de creación institucional en un contexto marcado por la emergencia sanitaria a raíz de la pandemia de la COVID-19, y comprometidos en la atención a nuestros estudiantes en la educación a distancia utilizando las herramientas de GOOGLE WORKSPACE FOR EDUATIÓN a fin de optimizar las clases virtuales que garanticen la mejora de los aprendizajes de nuestros estudiantes libertanos.
                                </p>
                            </div>
                        </div>
                        <div class="col col-lg-6 col-12">
                            <div class="history-image">
                                <img src="{{asset('../resources/img/history_4.jpg')}}" class="d-block w-100"> 
                            </div>
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
    anio.textContent=year;

    const anio2 = document.getElementById('anio2');
    anio2.textContent=year;


    const edad = document.getElementById('edad');
    edad.textContent=year-1828;
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