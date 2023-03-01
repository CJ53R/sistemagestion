@extends('layouts.home.app')

@section('title', 'Himno')

@section('css')
<link rel="stylesheet" href="{{asset('../resources/css/home/himno.css')}}">
@endsection



@section('content')

<div class="tuition bg-lig py-4">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col col-lg-6 text-center">
                <div class="card">
                    <div class="card-body">
                        <img src="{{asset('../resources/img/escudo_himno.png')}}" class="escudo" alt=""> <br>
                      <h4 class="card-title fw-bold cbg-primary">Himno del Colegio de La Libertad</h4>
                      <br>
                      <h6 class="card-subtitle mb-2 text-muted fw-bold">CORO</h6>
                      <div class="himno-text">
                        <span>Gloria eterna al egregio soldado</span>
                        <span>que este templo nos dio por hogar;</span>
                        <span>conservemos el fuego sagrado</span>
                        <span>que encendiera José de la Mar,</span>
                        <span>y a la próvida sombra del padre</span>
                        <span>todo honor patriotismo y lealtad</span>
                        <span>seamos dignos de honrar a la madre</span>
                        <span>que su nombre nos dio libertad.</span>
                      </div>
                      <br>
                      <h6 class="card-subtitle mb-2 text-muted fw-bold">I ESTROFA</h6>
                      <p class="himno-text">
                        <span>A la lid de la ciencia y del arte</span>
                        <span>acudamos con bélico ardor,</span>
                        <span>tremolando el glorioso estandarte</span>
                        <span>que en mil campos flameo vencedor.</span>
                        <span>El vigor que nos diera natura</span>
                        <span>en la lucha retiembla el saber</span>
                        <span>y escalemos la ríspida altura</span>
                        <span>a la enérgica voz del deber.</span>
                      </p>
                      <div class="himno-autor">
                        <span>Letra: Prof. Alejandro Dextre Sierra</span>
                        <span>Musica: Antonio Gúzman Arenas</span>
                      </div>
                    </div>
                  </div>
                  <audio controls class="audio-file" src="{{asset('../resources/multimedia/himno.mp3')}}"></audio>
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