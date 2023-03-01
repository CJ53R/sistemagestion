
@extends('layouts.admin.app')

@section('title', 'Edición de Perfil')
<link rel="stylesheet" href="{{asset('../resources/css/admin/register/form.css')}}">
<link rel="stylesheet" href="{{asset('../resources/css/admin/perzonalizado/button.css')}}">
<link rel="stylesheet" href="{{asset('../resources/css/admin/perzonalizado/titulo.css')}}">
@section('css')
  
@endsection



@section('content')
<section class="higher py-3 bg-lig">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <h1 class="fw-bold mb-0">{{auth()->user()->name}}</h1>
          <p class="lead text-muted">Revisa bien los datos antes de guardar</p>
        </div>
      </div>
    </div>
  </section>

<section class=" bg-mix mb-4">
    <div class="container">
       <div class="card">
        <div class="form-group col-12 text-center mt-4">
          <h5 class="fw-bold">Formulario</h5>
          <hr class="line mx-auto">
        </div>
          <form action="{{route('user.password.update', auth()->user())}}" method="POST" id="formulario">
            @csrf
            @method('put')
            <div class="card-body">
              <div class="row">
              <div class="form-group col-lg-4 col-md-6 col-sm-12 mb-3">
                <div class="contdiv" id="group_password">
                  <label>
                    <span>Nueva Contraseña</span>
                    <input type="password" autocomplete="off" name="password" id="password" onpaste="return false">
                    <i class="validacion_estado fa fa-times-circle" aria-hidden="true"></i>
                  </label>
                  @error('password')
                    <small class="text-danger">*{{$message}}</small>
                  @enderror
                  <p class="error_input">Ingrese contraseña más segura.</p>
                </div>
              </div>
              <div class="form-group col-lg-4 col-md-6 col-sm-12 mb-3">
                <div class="contdiv" id="group_repeat_password">
                  <label>
                    <span>Repita Contraseña Nueva</span>
                    <input type="password" autocomplete="off" name="repeat_password"  id="repeat_password" onpaste="return false">
                    <i class="validacion_estado fa fa-times-circle" aria-hidden="true"></i>
                  </label>
                  @error('repeat_password')
                    <small class="text-danger">*{{$message}}</small>
                  @enderror
                  <p class="error_input">No coincide.</p>
                </div>
              </div>
              <div class="form-group col-lg-4 col-md-6 col-sm-12 mb-3">
                <div class="contdiv" id="group_old_password">
                  <label>
                    <span>Contraseña Actual</span>
                    <input type="password" autocomplete="off" name="old_password"  id="old_password" onpaste="return false">
                    <i class="validacion_estado fa fa-times-circle" aria-hidden="true"></i>
                  </label>
                  @error('old_password')
                    <small class="text-danger">*{{$message}}</small>
                  @enderror
                  <p class="error_input">Ingrese contraseña actual.</p>
                </div>
              </div>
              @can('user.password.update')
              <div class="form-group col-12 text-center mx-2 mt-2">
                <button class="button" type="submit">Cambiar Contraseña</button>
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
  <script src="{{asset('../resources/js/admin/scriptpassword.js')}}"></script>
  <script src="{{asset('../resources/js/personalizado/button.js')}}"></script>

@if (session('info')=='ok')
    <script>
      swal({
                title: "¡Bien!",
                text: "¡Contraseña nueva asignada correctamente!",
                icon: "success",
                button: "OK!",
              });
    </script>
@endif

@if (session('info')=='error')
    <script>
      swal({
                title: "¡Uy!",
                text: "¡La contraseña actual fue mal ingresada!",
                icon: "error",
                button: "OK!",
              });
    </script>
@endif

@endsection