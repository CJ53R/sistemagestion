@extends('layouts.admin.app')

@section('title', 'Registro de Documento')

@section('css')
  <link rel="stylesheet" href="{{asset('../resources/css/admin/register/form.css')}}">
  <link rel="stylesheet" href="{{asset('../resources/css/admin/perzonalizado/inputfile.css')}}">
  <link rel="stylesheet" href="{{asset('../resources/css/admin/perzonalizado/button.css')}}">
  <link rel="stylesheet" href="{{asset('../resources/css/admin/perzonalizado/titulo.css')}}">
@endsection



@section('content')
<section class="higher py-3 bg-lig">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <h1 class="fw-bold mb-0">Bienvenido al Panel de Creación de Nuevo Documento</h1>
          <p class="lead text-muted">Revisa bien toda la información antes de guardar</p>
        </div>
        @can('admin.documento.index')
        <div class="col-lg-3 d-flex">
          <a class="btn button fw-bold align-self-center" href="{{route('admin.documento.index')}}">Ver Documentos Registrados</a>
        </div>
        @endcan
      </div>
    </div>
  </section>
<section class="bg-mix mb-4">
    <div class="container">
       <div class="card">
        <div class="form-group col-12 text-center mt-4">
          <h5 class="fw-bold">Formulario</h5>
          <hr class="line mx-auto">
        </div>
          <form action="{{route('admin.documento.store')}}" method="POST" id="formulario" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="row">
                <div class="form-group col-lg-4 col-md-4 col-12 mb-3">
                  <div class="contdiv" id="group_nombre">
                    <label>
                      <span>Nombre de Documento</span>
                      <input type="text" autocomplete="off" name="nombre" value="{{old('nombre')}}" id="nombre" onpaste="return false">
                      <i class="validacion_estado fa fa-times-circle" aria-hidden="true"></i>
                    </label>
                    @error('nombre')
                      <small class="text-danger">*{{$message}}</small>
                    @enderror
                    <p class="error_input">Ingrese un código válido. (REQUERIDO)</p>
                  </div>
                </div>
                <div class="form-group col-lg-4 col-md-4 col-12 mb-3">
                  <div class="contdiv" id="group_file">
                    <label>
                      <span>Archivo</span>
                      <input type="file" accept="application/pdf,application/msword,
                      application/vnd.openxmlformats-officedocument.wordprocessingml.document"   name="file" value="{{old('file')}}" id="file">
                      <i class="validacion_estado fa fa-times-circle" aria-hidden="true"></i>
                    </label>
                    @error('file')
                      <small class="text-danger">*{{$message}}</small>
                    @enderror
                    <p class="error_input">Seleccione un archivo válido. (REQUERIDO)</p>
                  </div>
                </div>

                @can('admin.documento.store')
                <div class="form-group col-12 mb-3 text-center">
                  <button class="button fw-bold align-self-center" type="submit">Guardar</button>
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
  <script src="{{asset('../resources/js/admin/scriptdocumento.js')}}"></script>
  <script src="{{asset('../resources/js/personalizado/button.js')}}"></script>
  @if (session('save')=='ok')
    <script>
      swal({
                title: "¡Bien!",
                text: "¡Acaba de Registrar un Nuevo Documento!",
                icon: "success",
                button: "OK!",
              });
    </script>
@endif
@endsection