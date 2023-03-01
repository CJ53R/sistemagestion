@extends('layouts.home.app')

@section('title', 'Todas las Noticias')

@section('css')
<link rel="stylesheet" href="{{asset('../resources/css/home/allnews.css')}}">
@endsection



@section('content')

<div class="tuition bg-lig py-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 tit">
        <h3>Noticias y Eventos</h3>
      </div>
      @foreach ($noticias as $noticia)
      <div class="col-lg-4 mt-4">
        <div class="cont-img">
          <a href="{{route('noticia.show', $noticia)}}">
            @foreach ($imagenes as $imagen)
            @if ($noticia->id == $imagen->noticia_id)
                <img src="{{asset($imagen->url)}}"> 
                @break;
            @endif
            @endforeach
          </a>
        </div>
        <div class="cont-info">
          <span class="title-noticia"><a href="{{route('noticia.show', $noticia)}}">{{$noticia->shortdescripcion}}</a></span>
        </div>
      </div>
      @endforeach

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