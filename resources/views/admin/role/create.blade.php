@extends('layouts.admin.app')

@section('title', 'Registro de Rol')

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
          <h1 class="fw-bold mb-0">Bienvenido al Panel de Creación de Nuevo Rol</h1>
          <p class="lead text-muted">Revisa bien toda la información antes de guardar</p>
        </div>
        @can('admin.role.index')
        <div class="col-lg-3 d-flex">
          <a class="btn button fw-bold align-self-center" href="{{route('admin.role.index')}}">Ver Roles Registrados</a>
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
          <form action="{{route('admin.role.store')}}" method="POST" id="formulario">
            @csrf
            <div class="card-body">
              <div class="row">
                <div class="form-group col-12 mb-3">
                  <div class="contdiv" id="group_name">
                    <label>
                      <span>Nombre de Rol</span>
                      <input type="text" autocomplete="off" name="name" value="{{old('name')}}" id="name" onpaste="return false">
                      <i class="validacion_estado fa fa-times-circle" aria-hidden="true"></i>
                    </label>
                    @error('nombre')
                      <small class="text-danger">*{{$message}}</small>
                    @enderror
                    <p class="error_input">Ingrese un nombre válido. (REQUERIDO)</p>
                  </div>
                </div>
                <div class="container">
                  <h6 class="fst-italic fw-bold">Lista de Permisos</h6>
                <div class="row checkbox">
                @foreach ($permissions as $permission)
                    <div class="col col-lg-3 col-md-4 col-sm-6 col-12 my-1 fw-bold">
                        {!! Form::checkbox('permissions[]', $permission->id,null, ['class' => 'mr-1', 'id' => $permission->id]) !!}
                      <label for="{{$permission->id}}">
                        {{$permission->descripcion}}
                      </label>
                    </div>
                @endforeach
                  </div>
                </div>
                @can('admin.role.store')
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
  <script src="{{asset('../resources/js/admin/scriptrole.js')}}"></script>
  <script src="{{asset('../resources/js/personalizado/button.js')}}"></script>
  @if (session('saveplace')=='ok')
    <script>
      swal({
                title: "¡Bien!",
                text: "¡Acaba de Registrar un Nuevo Usuario!",
                icon: "success",
                button: "OK!",
              });
    </script>
@endif
@endsection