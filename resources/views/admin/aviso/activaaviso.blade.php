@extends('layouts.admin.app')

@section('title', 'Aviso')

@section('css')
  <link rel="stylesheet" href="{{asset('../resources/css/admin/register/form.css')}}">
  <link rel="stylesheet" href="{{asset('../resources/css/admin/perzonalizado/button.css')}}">
  <link rel="stylesheet" href="{{asset('../resources/css/admin/perzonalizado/titulo.css')}}">
  <link rel="stylesheet" href="{{asset('../resources/css/img/styles.css')}}">
  <link rel="stylesheet" href="{{asset('../resources/css/img/imgstyle.css')}}">
@endsection



@section('content')
<section class="higher py-3 bg-lig">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="fw-bold mb-0">Bienvenido al Panel de Activar Aviso Emergente</h1>
          <p class="lead text-muted">Revise bien toda la información antes de guardar</p>
        </div>
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
          <form action="{{route('admin.updateaviso.aviso', $div)}}" method="POST" id="formulario" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-body">
              <div class="row">
                <div class="form-group col-lg-4 col-md-6 col-sm-12 mb-3">
                  <div class="contdiv" id="group_estado">
                    <label>
                      <span>Estado</span>
                      <select name="estado" id="estado">
                        <option selected hidden></option>
                        @foreach ($estados -> sortBy('nombreestadouser') as $estado)
                          <option  value="{{$estado['id']}}" {{old('estado') == $estado['id'] ? 'selected':''}} {{$div->activamatricula_id == $estado['id'] ? 'selected':''}}>{{$estado['name']}}</option>
                        @endforeach
                      </select>
                      <i class="validacion_estado fa fa-times-circle" aria-hidden="true"></i>
                    </label>
                    @error('estado')
                      <small class="text-danger">*{{$message}}</small>
                    @enderror
                    <p class="error_input">Seleccione un estado. (REQUERIDO)</p>
                  </div>
                </div>
                
                <div class="col-lg-4">
                  <p class="bg-primary-l fw-bold">Imagen de Aviso</p>
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
                @can('admin.updateaviso.aviso')
                <div class="form-group col-12 mb-3 text-center mt-4">
                  <button class="button fw-bold align-self-center" type="submit">Editar</button>
                </div>
                @endcan
              </div>
            </div>
          </form>
        </div>
    </div>

    <div class="container mb-4">
      <div class="card mt-4">
        <div class="img-title text-center mt-2">
          <h5 class="fw-bold">Imagen de Aviso</h5>
        </div>
        <div class="card-body">
          <div class="row">
              <div class="col col-lg-4 mt-4">
                <form action="{{route('admin.updateaviso.avisoimg', $div)}}" class="{{$div->id}}" method="POST">
                  @csrf
                  @method('put')
                  <div class="imgnoticia">
                    <img src="{{asset($div->url)}}"> 
                  </div>
                  <div class="img-button text-center">
                    <button class="button fw-bold align-self-center btn-delete" type="submit" id="{{$div->id}}">Eliminar</button>
                  </div>
                </form>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection



@section('script')
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="{{asset('../resources/js/admin/scriptactivaaviso.js')}}"></script>
  <script src="{{asset('../resources/js/personalizado/button.js')}}"></script>
  <script src="{{asset('../resources/js/img/only/scriptimg.js')}}"></script>
  <script src="{{asset('../resources/js/admin/scriptList.js')}}"></script>
  @if (session('edit')=='ok')
    <script>
      swal({
                title: "¡Bien!",
                text: "¡Editó Correctamente el Aviso Emergente de la Página!",
                icon: "success",
                button: "OK!",
              });
    </script>
@endif
@endsection