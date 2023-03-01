@extends('layouts.admin.app')

@section('title', 'Editar Pregunta')

@section('css')
  <link rel="stylesheet" href="{{asset('../resources/css/admin/register/form.css')}}">
  <link rel="stylesheet" href="{{asset('../resources/css/admin/perzonalizado/checkbox.css')}}">
  <link rel="stylesheet" href="{{asset('../resources/css/admin/perzonalizado/button.css')}}">
  <link rel="stylesheet" href="{{asset('../resources/css/admin/perzonalizado/titulo.css')}}">
@endsection



@section('content')
<section class="higher py-3 bg-lig">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <h1 class="fw-bold mb-0">Bienvenido al Panel de Edición de Pregunta Frecuente</h1>
          <p class="lead text-muted">Revise bien toda la información antes de guardar</p>
        </div>
        @can('admin.pregunta.index')
        <div class="col-lg-3 d-flex">
          <a class="btn button fw-bold align-self-center" href="{{route('admin.pregunta.index')}}">Ver Preguntas Frecuentes Registradas</a>
        </div>
        @endcan
      </div>
    </div>
  </section>
<section class="bg-mix pt-4 mb-4">
    <div class="container">
       <div class="card">
        <div class="form-group col-12 text-center mt-4">
          <h5 class="fw-bold">Formulario</h5>
          <hr class="line mx-auto">
        </div>
          <form action="{{route('admin.pregunta.update', $pregunta)}}" method="POST" id="formulario">
            @csrf
            @method('put')
            <div class="card-body">
              <div class="row">
                <div class="form-group col-12 mb-3">
                  <div class="contdiv" id="group_pregunta">
                    <label>
                      <span>Pregunta</span>
                      <input type="text" autocomplete="off" name="pregunta" value="{{$pregunta->pregunta}}" id="pregunta" onpaste="return false">
                      <i class="validacion_estado fa fa-times-circle" aria-hidden="true"></i>
                    </label>
                    @error('pregunta')
                      <small class="text-danger">*{{$message}}</small>
                    @enderror
                    <p class="error_input">Ingrese un texto válido. (REQUERIDO)</p>
                  </div>
                </div>
                <div class="form-group col-12 mb-3">
                  <div class="contdiv" id="group_respuesta">
                    <label>
                      <span>Respuesta</span>
                      <input type="text" autocomplete="off" name="respuesta" value="{{$pregunta->respuesta}}" id="respuesta" onpaste="return false">
                      <i class="validacion_estado fa fa-times-circle" aria-hidden="true"></i>
                    </label>
                    @error('respuesta')
                      <small class="text-danger">*{{$message}}</small>
                    @enderror
                    <p class="error_input">Ingrese un texto válido. (REQUERIDO)</p>
                  </div>
                </div>
                @can('admin.pregunta.update')
                <div class="form-group col-12 mb-3 text-center">
                  <button class="button fw-bold align-self-center my-2" type="submit">Editar</button>
                </div>
                @endcan
              </div>
            </div>
          </form>
        </div>
    </div>
  </section>
@endsection



@section('script')
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="{{asset('../resources/js/admin/scriptpregunta.js')}}"></script>
  <script src="{{asset('../resources/js/personalizado/button.js')}}"></script>
  @if (session('edit')=='ok')
    <script>
      swal({
                title: "¡Bien!",
                text: "¡Editó Correctamente la Pregunta!",
                icon: "success",
                button: "OK!",
              });
    </script>
@endif
@endsection