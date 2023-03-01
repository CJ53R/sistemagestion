@extends('layouts.home.app')

@section('title', 'Orientaciones COVID-19')

@section('css')
<link rel="stylesheet" href="{{asset('../resources/css/home/covid.css')}}">
@endsection



@section('content')

<div class="tuition bg-lig py-4">
  <div class="container">
    <div class="row justify-content-center cont">
      <div class="col col-lg-12 col-md-12 col-sm-12 col-12 mb-4">
        <h3 class="title-pag">ABCD para estar seguros en clase</h3>
      </div>
      <div class="col col-lg-3 col-md-3 col-sm-6 col-12 mb-3">
        <div class="cont-paso">
          <div class="paso">
            <span class="num">A</span>
            <span class="det">seo, de las manos</span>
          </div>
          <div class="img-paso text-center">
            <img src="{{asset('../resources/img/covid_1.jpg')}}">
          </div>
          <div id="content" class="col-lg-12 my-1">
            <div id="element" class="col-lg-12" style="display: none;"> 
                <div class="btn-cont text-center"><button class="btnclose" href="#" id="hide" title="Cerrar">Ver Menos</button></div>
                <div class="more-info">
                  <span>Lavarse las manos puede mantenernos sanos y prevenir la propagación de enfermedades.</span>
                </div>
            </div>
          </div>
          <div class="btn-cont text-center"><button class="btnmore" href="#" id="show">Ver Más</i></button></div>
        </div>
      </div>
      <div class="col col-lg-3 col-md-3 col-sm-6 col-12 mb-3">
        <div class="cont-paso">
          <div class="paso">
            <span class="num">B</span>
            <span class="det">oca, cubierta</span>
          </div>
          <div class="img-paso text-center">
            <img src="{{asset('../resources/img/covid_2.jpg')}}">
          </div>
          <div id="content" class="col-lg-12 my-1">
            <div id="element2" class="col-lg-12" style="display: none;"> 
                <div class="btn-cont text-center"><button class="btnclose" href="#" id="hide2" title="Cerrar">Ver Menos</button></div>
                <div class="more-info">
                  <span>En espacios cerrados has uso de este accesorio para evitar la expansión de la epidemia.</span>
                </div>
            </div>
          </div>
          <div class="btn-cont text-center"><button class="btnmore" href="#" id="show2">Ver Más</i></button></div>
        </div>
      </div>
      <div class="col col-lg-3 col-md-3 col-sm-6 col-12 mb-3">
        <div class="cont-paso">
          <div class="paso">
            <span class="num">C</span>
            <span class="det">uida, a los demás</span>
          </div>
          <div class="img-paso text-center">
            <img src="{{asset('../resources/img/covid_3.jpg')}}">
          </div>
          <div id="content" class="col-lg-12 my-1">
            <div id="element3" class="col-lg-12" style="display: none;"> 
                <div class="btn-cont text-center"><button class="btnclose" href="#" id="hide3" title="Cerrar">Ver Menos</button></div>
                <div class="more-info">
                  <span>Si estás infectado, debes de quedarte en casa, excepto si necesitas atención médica.</span>
                </div>
            </div>
          </div>
          <div class="btn-cont text-center"><button class="btnmore" href="#" id="show3">Ver Más</i></button></div>
        </div>
      </div>
      <div class="col col-lg-3 col-md-3 col-sm-6 col-12 mb-3">
        <div class="cont-paso">
          <div class="paso">
            <span class="num">D</span>
            <span class="det">istanciamiento</span>
          </div>
          <div class="img-paso text-center">
            <img src="{{asset('../resources/img/covid_4.jpg')}}">
          </div>
          <div id="content" class="col-lg-12 my-1">
            <div id="element4" class="col-lg-12" style="display: none;"> 
                <div class="btn-cont text-center"><button class="btnclose" href="#" id="hide4" title="Cerrar">Ver Menos</button></div>
                <div class="more-info">
                  <span>Mantenga un espacio físico entre otra persona que no viva en tu hogar. </span>
                </div>
            </div>
          </div>
          <div class="btn-cont text-center"><button class="btnmore" href="#" id="show4">Ver Más</i></button></div>
        </div>
      </div>

      <div class="col col-lg-12 col-md-12 col-sm-12 col-12 mt-4 ctnb">
        @if ($covid->urlcovid!='')
          <a href="{{asset($covid->urlcovid)}}"  target="_blank" class="btn-pdf">Protocolos PDF</a>
        @endif
      </div>
    </div>
</div>
</div>
@endsection



@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> 
<script src="{{asset('../resources/js/home/covid.js')}}"></script>

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