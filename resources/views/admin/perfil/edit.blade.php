@extends('layouts.admin.app')

@section('title', 'Edición de Perfil')

@section('css')
  <link rel="stylesheet" href="{{asset('../resources/css/admin/register/form.css')}}">
  <link rel="stylesheet" href="{{asset('../resources/css/admin/perzonalizado/button.css')}}">
  <link rel="stylesheet" href="{{asset('../resources/css/admin/perzonalizado/titulo.css')}}">
@endsection



@section('content')
<section class="higher py-3 bg-lig">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <h1 class="fw-bold mb-0">{{auth()->user()->name}}</h1>
          <p class="lead text-muted">Revisa bien toda la información antes de guardar</p>
        </div>
        @can('user.avatar.index')
        <div class="col-lg-3 d-flex">
          <a class="btn button fw-bold align-self-center" href="{{route('user.avatar.index', auth()->user())}}">Subir Foto</a>
        </div>
        @endcan
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
          <form action="{{route('admin.perfil.update', auth()->user())}}" method="POST" id="formulario">
            @csrf
            @method('put')
            <div class="card-body">
              <div class="row">
                <div class="form-group col-12">
                  <h6 class="fw-bold text-center">Formulario de Edición de Perfil</h6>
                </div>
                <div class="form-group col-lg-4 col-md-6 col-sm-12 mb-3">
                  <div class="contdivcodigo">
                    <label>
                      <span>Codigo de {{$trabajador->users->tipousuario->nombretipousuario}}</span>
                      <input type="text" autocomplete="off" id="codigoTrabajador" value="{{auth()->user()->codigo}}" name="codigoTrabajador">
                      <i class="validacion_estado fa fa-check-circle" aria-hidden="true"></i>
                    </label>
                    @error('codigoTrabajador')
                      <small class="text-danger">*{{$message}}</small>
                    @enderror
                  </div>
                </div>
                <div class="form-group col-lg-4 col-md-6 col-sm-12 mb-3">
                  <div class="contdiv" id="group_numdocumento">
                    <label>
                      <span>N° de Documento</span>
                      <input type="text" autocomplete="off" value="{{$trabajador->numDocumento}}"  name="numdocumento" id="numdocumento" onpaste="return false">
                      <i class="validacion_estado fa fa-times-circle" aria-hidden="true"></i>
                    </label>
                    @error('numdocumento')
                      <small class="text-danger">*{{$message}}</small>
                    @enderror
                    <p class="error_input">Ingrese un numéro de documento válido. (REQUERIDO)</p>
                  </div>
                </div>
                <div class="form-group col-lg-4 col-md-6 col-sm-12 mb-3">
                  <div class="contdiv" id="group_fnacimiento">
                    <label>
                      <span>Fecha de Nacimiento</span>
                      <input type="date" id="fnacimiento" value="{{$trabajador->fnacimiento}}" name="fnacimiento">
                      <i class="validacion_estado fa fa-times-circle" aria-hidden="true"></i>
                    </label>
                    @error('fnacimiento')
                      <small class="text-danger">*{{$message}}</small>
                    @enderror
                    <p class="error_input">Ingrese una fecha válida. (REQUERIDO)</p>
                  </div>
                </div>
                <div class="form-group col-lg-4 col-md-6 col-sm-12 mb-3">
                  <div class="contdiv" id="group_nombre">
                    <label>
                      <span>Nombres</span>
                      <input type="text" autocomplete="off" name="nombre" value="{{$trabajador->nombres}}" id="nombre" onpaste="return false">
                      <i class="validacion_estado fa fa-times-circle" aria-hidden="true"></i>
                    </label>
                    @error('nombre')
                      <small class="text-danger">*{{$message}}</small>
                    @enderror
                    <p class="error_input">Los datos ingresados son incorrectos no puedes utilizar números o simbolos intenta con textos y letras. (REQUERIDO)</p>
                  </div>
                </div>
                <div class="form-group col-lg-4 col-md-6 col-sm-12 mb-3">
                  <div class="contdiv" id="group_apaterno">
                    <label>
                      <span>Apellido Paterno</span>
                      <input type="text" autocomplete="off" name="apaterno" value="{{$trabajador->apaterno}}" id="apaterno" onpaste="return false">
                      <i class="validacion_estado fa fa-times-circle" aria-hidden="true"></i>
                    </label>
                    @error('apaterno')
                      <small class="text-danger">*{{$message}}</small>
                    @enderror
                    <p class="error_input">Los datos ingresados son incorrectos no puedes utilizar números o simbolos intenta con textos y letras. (REQUERIDO)</p>
                  </div>
                </div>
                <div class="form-group col-lg-4 col-md-6 col-sm-12 mb-3">
                  <div class="contdiv" id="group_amaterno">
                    <label>
                      <span>Apellido Materno</span>
                      <input type="text" autocomplete="off" name="amaterno" value="{{$trabajador->amaterno}}" id="amaterno" onpaste="return false">
                      <i class="validacion_estado fa fa-times-circle" aria-hidden="true"></i>
                    </label>
                    @error('amaterno')
                      <small class="text-danger">*{{$message}}</small>
                    @enderror
                    <p class="error_input">Los datos ingresados son incorrectos no puedes utilizar números o simbolos intenta con textos y letras. (REQUERIDO)</p>
                  </div>
                </div>
                <hr>
                <div class="form-group col-lg-4 col-md-6 col-sm-12 mb-3">
                  <div class="contdiv" id="group_genero">
                    <label>
                      <span>Género</span>
                      <select name="genero" id="genero">
                        <option selected hidden></option>
                        @foreach ($generos -> sortBy('nombregenero') as $genero)
                          <option  value="{{$genero['id']}}" {{old('genero') == $genero['id'] ? 'selected':''}} {{$trabajador->generot->id == $genero['id'] ? 'selected':''}}>{{$genero['nombregenero']}}</option>
                        @endforeach
                      </select>
                      <i class="validacion_estado fa fa-times-circle" aria-hidden="true"></i>
                    </label>
                    @error('genero')
                      <small class="text-danger">*{{$message}}</small>
                    @enderror
                    <p class="error_input">Seleccione un género. (REQUERIDO)</p>
                  </div>
                </div>
                <div class="form-group col-lg-4 col-md-6 col-sm-12 mb-3">
                  <div class="contdiv" id="group_telefono">
                    <label>
                      <span>N° de Celular</span>
                      <input type="text" autocomplete="off" name="telefono" value="{{$trabajador->telefono}}" id="telefono" onpaste="return false">
                      <i class="validacion_estado fa fa-times-circle" aria-hidden="true"></i>
                    </label>
                    @error('telefono')
                      <small class="text-danger">*{{$message}}</small>
                    @enderror
                    <p class="error_input">Ingrese un numéro de celular válido.(OPCIONAL)</p>
                  </div>
                </div>
                <div class="form-group col-lg-4 col-md-6 col-sm-12  mb-3">
                  <div class="contdiv" id="group_direccion">
                    <label>
                      <span>Dirección</span>
                      <input type="text" autocomplete="off" name="direccion" value="{{$trabajador->direccion}}" id="direccion" onpaste="return false">
                      <i class="validacion_estado fa fa-times-circle" aria-hidden="true"></i>
                    </label>
                    @error('direccion')
                      <small class="text-danger">*{{$message}}</small>
                    @enderror
                    <p class="error_input">Ingrese una dirección válida. (OPCIONAL)</p>
                  </div>
                </div>
                <div class="form-group col-lg-4 col-md-6 col-sm-12  mb-3">
                  <div class="contdiv" id="group_email">
                    <label>
                      <span>Correo Electrónico</span>
                      <input type="text" autocomplete="off" name="email" value="{{$trabajador->email}}" id="email" onpaste="return false">
                      <i class="validacion_estado fa fa-times-circle" aria-hidden="true"></i>
                    </label>
                    @error('email')
                      <small class="text-danger">*{{$message}}</small>
                    @enderror
                    <p class="error_input">Ingrese una dirección de correo electroóco válida. (OPCIONAL)</p>
                  </div>
                </div>
                @can('admin.perfil.update')
                <div class="form-group col-12 mb-3 text-center">
                  <button class="button fw-bold" type="submit">Editar Perfil</button>
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
  <script src="{{asset('../resources/js/admin/scriptperfiledit.js')}}"></script>
  <script src="{{asset('../resources/js/personalizado/button.js')}}"></script>
  @if (session('saveplace')=='ok')
    <script>
      swal({
                title: "¡Bien!",
                text: "¡Perfil correctamente editado!",
                icon: "success",
                button: "OK!",
              });
    </script>
@endif
@endsection