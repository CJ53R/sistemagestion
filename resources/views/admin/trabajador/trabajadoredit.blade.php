@extends('layouts.admin.app')

@section('title', 'Edición de Trabajador')

@section('css')
  <link rel="stylesheet" href="{{asset('../resources/css/admin/register/form.css')}}">
  <link rel="stylesheet" href="{{asset('../resources/css/admin/perzonalizado/button.css')}}">
  <link rel="stylesheet" href="{{asset('../resources/css/admin/perzonalizado/titulo.css')}}">
  <link rel="stylesheet" href="{{asset('../resources/css/img/styles.css')}}">
@endsection

@section('content')
<section class="higher pt-3 bg-lig">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <h1 class="fw-bold mb-0">Bienvenido al Panel de Edición de Trabajador</h1>
          <p class="lead text-muted">Revisa bien toda la información antes de guardar</p>
        </div>
        @can('admin.trabajador.showTrabajadorList')
        <div class="col-lg-3 d-flex">
          <a class="btn button fw-bold align-self-center" href="{{route('admin.trabajador.showTrabajadorList')}}">Ver Trabajadores Registrados</a>
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
          <form action="{{route('admin.trabajador.update', $trabajador)}}" method="POST" id="formulario" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-body">
              <div class="row">
                <div class="form-group col-lg-4 col-md-6 col-sm-12 mb-3">
                  <div class="contdiv" id="group_codigo">
                    <label>
                      <span>Código de {{$trabajador->users->tipousuario->nombretipousuario}}</span>
                      <input type="text" autocomplete="off" value="{{$trabajador->users->codigo}}"  name="codigo" id="codigo" onpaste="return false">
                      <i class="validacion_estado fa fa-times-circle" aria-hidden="true"></i>
                    </label>
                    @error('codigo')
                      <small class="text-danger">*{{$message}}</small>
                    @enderror
                    <p class="error_input">Ingrese un código válido. (REQUERIDO)</p>
                  </div>
                </div>
                <div class="form-group col-lg-4 col-md-6 col-sm-12 mb-3">
                  <div class="contdiv" id="group_tipodocumento">
                    <label>
                      <span>Tipo de Documento</span>
                      <select name="tipodocumento" id="tipodocumento">
                        <option selected hidden></option>
                        @foreach ($tipodocumentos -> sortBy('nombretipodocumento') as $tipodocumento)
                          <option  value="{{$tipodocumento['id']}}" {{old('tipodocumento') == $tipodocumento['id'] ? 'selected':''}} {{$trabajador->tipodocumentot->id == $tipodocumento['id'] ? 'selected':''}}>{{$tipodocumento['nombretipodocumento']}}</option>                        @endforeach
                      </select>
                      <i class="validacion_estado fa fa-times-circle" aria-hidden="true"></i>
                    </label>
                    @error('tipodocumento')
                      <small class="text-danger">*{{$message}}</small>
                    @enderror
                    <p class="error_input">Seleccione un tipo de documento. (REQUERIDO)</p>
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
                  <div class="contdiv" id="group_fregistro">
                    <label>
                      <span>Fecha de Registro</span>
                      <input type="date" id="fregistro" value="{{$trabajador->fregistro}}" name="fregistro">
                      <i class="validacion_estado fa fa-times-circle" aria-hidden="true"></i>
                    </label>
                    @error('fregistro')
                      <small class="text-danger">*{{$message}}</small>
                    @enderror
                    <p class="error_input">Ingrese una fecha válida. (REQUERIDO)</p>
                  </div>
                </div>
                <div class="form-group col-lg-4 col-md-6 col-sm-12 mb-3">
                  <div class="contdiv" id="group_tipousuario">
                    <label>
                      <span>Tipo de Usuario</span>
                      <select name="tipousuario" id="tipousuario">
                        <option selected hidden></option>
                        @foreach ($tipousuarios -> sortBy('nombretipousuario') as $tipousuario)
                          @if ($tipousuario->nombretipousuario!='Alumno')
                            <option  value="{{$tipousuario['id']}}" {{old('tipousuario') == $tipousuario['id'] ? 'selected':''}} {{$trabajador->users->tipousuario->id == $tipousuario['id'] ? 'selected':''}}>{{$tipousuario['nombretipousuario']}}</option>
                          @endif
                        @endforeach
                      </select>
                      <i class="validacion_estado fa fa-times-circle" aria-hidden="true"></i>
                    </label>
                    @error('genero')
                      <small class="text-danger">*{{$message}}</small>
                    @enderror
                    <p class="error_input">Seleccione un tipo de usuario. (REQUERIDO)</p>
                  </div>
                </div>
                <div class="form-group col-lg-4 col-md-6 col-sm-12 mb-3">
                  <div class="contdiv" id="group_estado">
                    <label>
                      <span>Estado</span>
                      <select name="estado" id="estado">
                        <option selected hidden></option>
                        @foreach ($estados -> sortBy('nombreestadouser') as $estado)
                          <option  value="{{$estado['id']}}" {{old('estado') == $estado['id'] ? 'selected':''}} {{$trabajador->users->estadouser->id == $estado['id'] ? 'selected':''}}>{{$estado['nombreestadouser']}}</option>
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
                <div class="form-group col-lg-6 col-md-6 col-sm-12 mb-3">
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
                <div class="form-group col-lg-6 col-md-6 col-sm-12 mb-3">
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
                <div class="form-group col-lg-4 col-md-6 col-sm-12 mb-3" id="dnivel">
                  <div class="contdiv" id="group_nivel">
                    <label>
                      <span>Nivel Acádemico</span>
                      <select name="nivel" id="nivel">
                        <option selected hidden></option>
                        @foreach ($niveles -> sortBy('nombrenivel') as $nivel)
                          <option value="{{$nivel['id']}}" {{old('nivel') == $nivel['id'] ? 'selected':''}} {{$trabajador->nivel_id == $nivel['id'] ? 'selected':''}}>{{$nivel['nombrenivel']}}</option>
                        @endforeach
                      </select>
                      <i class="validacion_estado fa fa-times-circle" aria-hidden="true"></i>
                    </label>
                    @error('nivel')
                      <small class="text-danger">*{{$message}}</small>
                    @enderror
                    <p class="error_input">Seleccione un género. (REQUERIDO)</p>
                  </div>
                </div>
                <div class="form-group col-lg-8 col-md-6 col-sm-12 mb-3" id="dnivsec">
                  <div class="contdiv" id="group_nivsec">
                    <label>
                      <span id="aleatorio">Grado y Secciones a Cargo (Ejemplo: 1° - A, 2° - C,...)</span>
                      <input type="text" autocomplete="off" name="nivsec" value="{{$trabajador->nivsec}}" id="nivsec" onpaste="return false">
                      <i class="validacion_estado fa fa-times-circle" aria-hidden="true"></i>
                    </label>
                    @error('nivsec')
                      <small class="text-danger">*{{$message}}</small>
                    @enderror
                    <p class="error_input">Ingrese grados y secciones a cargo del nuevo trabajador. (OPCIONAL)</p>
                  </div>
                </div>

                <div class="col-lg-4">
                  <p class="bg-primary-l fw-bold">Imagen<small class="text-muted text-danger"> (Tamaño sugerido: 50 x 50px)</small></p>
                  <section id="Images" class="images-cards">
                      <div class="row">
                          <div class="col-xl-6 col-lg-6 col-md-3 col-sm-4 col-xs-12" id="add-photo-container">
                              <div class="add-new-photo first" id="add-photo">
                                  <span><i class="icon-camera"></i></span>
                              </div>
                              <input type="file" accept="image/*"  id="file" name="file">
                          </div>
                      </div>
                      @error('file')
                            <small class="text-danger fw-bold">*{{$message}}</small>
                      @enderror
                    </section>
                </div>
                @can('admin.trabajador.update')
                <div class="form-group col-12 mb-3 text-center mt-2">
                  <button class="button fw-bold align-self-center" type="submit">Editar</button>
                </div>
                @endcan
              </div>
            </div>
          </form>
        </div>
    </div>

    <div class="container mt-4">
      <div class="card">
       <div class="form-group col-12 text-center mt-4">
         <h5 class="fw-bold">Cambio de Contraseña</h5>
         <hr class="line mx-auto">
       </div>
         <form action="{{route('user.passwordad.update', $trabajador->users)}}" method="POST" id="formulario2">
           @csrf
           @method('put')
           <div class="card-body">
             <div class="row">
             <div class="form-group col-lg-6 col-md-6 col-sm-12 mb-3">
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
             <div class="form-group col-lg-6 col-md-6 col-sm-12 mb-3">
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
  <script src="{{asset('../resources/js/admin/scripttrabajador.js')}}"></script>
  <script src="{{asset('../resources/js/admin/passwordEdit.js')}}"></script>
  <script src="{{asset('../resources/js/personalizado/button.js')}}"></script>
  <script src="{{asset('../resources/js/img/only/scriptimg.js')}}"></script>
  @if (session('saveplace')=='ok')
    <script>
      swal({
                title: "¡Bien!",
                text: "¡Acaba de Editar Correctamente los Datos del Trabajador!",
                icon: "success",
                button: "OK!",
              });
    </script>
@endif
@endsection