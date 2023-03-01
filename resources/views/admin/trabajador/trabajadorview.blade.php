@extends('layouts.admin.app')

@section('title', 'Trabajador')

@section('css')
<link rel="stylesheet" href="{{asset('../resources/css/admin/perzonalizado/button.css')}}">
@endsection



@section('content')
<section class="higher py-3 bg-lig">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <h1 class="fw-bold mb-0">Datos de {{$trabajador->nombres}} {{$trabajador->apaterno}} {{$trabajador->amaterno}}</h1>
          <p class="lead text-muted">(Estudiante)</p>
        </div>
        @can('admin.trabajador.showTrabajadorList')
        <div class="col-lg-3 d-flex">
          <a class="btn button fw-bold align-self-center" href="{{route('admin.trabajador.showTrabajadorList')}}">Ver Trabajadores Registrados</a>
        </div>
        @endcan
      </div>
    </div>
  </section>

<section class="mt-4 mb-4">
    <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="row">
              <div class="card">
                <h6 class="fw-bold">Nombre Completo:</h6>
                <h6>{{$trabajador->nombres}} {{$trabajador->apaterno}} {{$trabajador->amaterno}}</h6>
                <h6 class="fw-bold">N° de Documento:</h6>
                <h6>{{$trabajador->numDocumento}}</h6>
                <h6 class="fw-bold">Dirección:</h6>
                <h6>{{$trabajador->direccion}}</h6>
                <h6 class="fw-bold">N° Celular:</h6>
                <h6>{{$trabajador->telefono}}</h6>
                <h6 class="fw-bold">Correo Electrónico:</h6>
                <h6>{{$trabajador->email}}</h6>
                <h6 class="fw-bold">Código:</h6>
                <h6>{{$trabajador->users->codigo}}</h6>
              </div>
            </div>
          </div>
        </div>
    </div>
  </section>
@endsection



@section('script')
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="{{asset('../resources/js/personalizado/button.js')}}"></script>
@endsection