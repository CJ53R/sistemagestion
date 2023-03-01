@extends('layouts.home.app')

@section('title', 'Documentos')

@section('css')
<link rel="stylesheet" href="{{asset('../resources/css/home/horario.css')}}">
@endsection



@section('content')

<div class="tuition bg-lig py-4">
  <div class="container">
    <div class="ctn-tittle">
      <h3>Documentos</h3>
    </div>
    <div class="row justify-content-center cont">
      @foreach ($documentos as $documento)
      <div class="col col-lg-3 col-md-4 col-sm-6 col-12 ctn-btn mt-3">
        <li><a href="{{asset($documento->url)}}" target="blank">{{$documento->nombre}}</a></li>
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