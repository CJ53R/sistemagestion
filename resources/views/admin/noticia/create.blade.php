@extends('layouts.admin.app')

@section('title', 'Registro de Noticia')

@section('css')
  <link rel="stylesheet" href="{{asset('../resources/css/admin/register/form.css')}}">
  <link rel="stylesheet" href="{{asset('../resources/css/admin/perzonalizado/button.css')}}">
  <link rel="stylesheet" href="{{asset('../resources/css/admin/perzonalizado/titulo.css')}}">
  <link rel="stylesheet" href="{{asset('../resources/css/img/stylemulti.css')}}">
@endsection



@section('content')
<section class="higher py-3 bg-lig">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <h1 class="fw-bold mb-0">Bienvenido al Panel de Creación de Nueva Noticia</h1>
          <p class="lead text-muted">Revisa bien toda la información antes de guardar</p>
        </div>
        @can('admin.noticia.index')
        <div class="col-lg-3 d-flex">
          <a class="btn button fw-bold align-self-center" href="{{route('admin.noticia.index')}}">Ver Noticias Registradas</a>
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
          <form action="{{route('admin.noticia.store')}}" method="POST" id="formulario" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="row">
                <div class="form-group col-lg-6 col-md-12 col-sm-12 col-12 mb-3">
                  <div class="contdiv" id="group_titulo">
                    <label>
                      <span>Título de Noticia</span>
                      <input type="text" autocomplete="off" name="titulo" value="{{old('titulo')}}" id="titulo">
                      <i class="validacion_estado fa fa-times-circle" aria-hidden="true"></i>
                    </label>
                    @error('titulo')
                      <small class="text-danger">*{{$message}}</small>
                    @enderror
                    <p class="error_input">Ingrese un título válido. (REQUERIDO)</p>
                  </div>
                </div>
                <div class="form-group col-lg-3 col-md-6 col-sm-6 col-12 mb-3">
                  <div class="contdiv" id="group_fpublicacion">
                    <label>
                      <span>Fecha de Publicación</span>
                      <input type="date" id="fpublicacion" value="{{old('fpublicacion')}}" name="fpublicacion">
                      <i class="validacion_estado fa fa-times-circle" aria-hidden="true"></i>
                    </label>
                    @error('fpublicacion')
                      <small class="text-danger">*{{$message}}</small>
                    @enderror
                    <p class="error_input">Ingrese una fecha válida. (REQUERIDO)</p>
                  </div>
                </div>
                <div class="form-group col-lg-3 col-md-6 col-sm-6 col-12 mb-3">
                  <div class="contdiv" id="group_estado">
                    <label>
                      <span>Estado</span>
                      <select name="estado" id="estado">
                        <option selected hidden></option>
                        @foreach ($estados -> sortBy('nombregenero') as $estado)
                          <option value="{{$estado['id']}}" {{old('estado') == $estado['id'] ? 'selected':''}}>{{$estado['nombreestado']}}</option>
                        @endforeach
                      </select>
                      <i class="validacion_estado fa fa-times-circle" aria-hidden="true"></i>
                    </label>
                    @error('estado')
                      <small class="text-danger">*{{$message}}</small>
                    @enderror
                    <p class="error_input">Seleccione un género. (REQUERIDO)</p>
                  </div>
                </div>
                <div class="form-group col-12 mb-3">
                  <div class="contdiv" id="group_shortdescripcion">
                    <label>
                      <span>Descripción Corta</span>
                      <textarea name="shortdescripcion"  id="shortdescripcion"  rows="4"> {{old('shortdescripcion')}}</textarea>
                      <i class="validacion_estado fa fa-times-circle" aria-hidden="true"></i>
                    </label>
                    @error('shortdescripcion')
                      <small class="text-danger">*{{$message}}</small>
                    @enderror
                    <p class="error_input">Ingrese una descripción válida. (REQUERIDO)</p>
                  </div>
                </div>
                <div class="form-group col-12 mb-3">
                  <div class="contdiv" id="group_largedescripcion">
                    <label>
                      <span>Descripción Completa</span>
                      <textarea type="text"  id="largedescripcion" name="largedescripcion"  rows="10">{{old('largedescripcion')}}</textarea>
                      <i class="validacion_estado fa fa-times-circle" aria-hidden="true"></i>
                    </label>
                    @error('largedescripcion')
                      <small class="text-danger">*{{$message}}</small>
                    @enderror
                    <p class="error_input">Ingrese una descripción válida. (REQUERIDO)</p>
                  </div>
                </div>
                <div class="col-lg-12">
                  <p class="bg-primary-l fw-bold">Imagen<small class="text-muted text-danger"> (Tamaño sugerido: 400 x 200px)</small></p>
                  <section id="Images" class="images-cards">
                      <div class="row">
                          <div class="col-xl-4 col-lg-4 col-md-3 col-sm-4 col-xs-12" id="add-photo-container">
                              <div class="add-new-photo first" id="add-photo">
                                  <span><i class="icon-camera"></i></span>
                              </div>
                              <input multiple type="file" accept="image/*"  id="file" name="file[]">
                          </div>
                      </div>
                      @error('file')
                            <small class="text-danger fw-bold">*{{$message}}</small>
                      @enderror
                    </section>
                </div>
                @can('admin.noticia.store')
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
  <script src="{{asset('../resources/js/admin/scriptnoticia.js')}}"></script>
  <script src="{{asset('../resources/js/img/multi/scriptimamulti.js')}}"></script>
  <script src="{{asset('../resources/js/personalizado/button.js')}}"></script>
  @if (session('save')=='ok')
    <script>
      swal({
                title: "¡Bien!",
                text: "¡Acaba de Registrar una Nueva Noticia!",
                icon: "success",
                button: "OK!",
              });
    </script>
@endif
@endsection