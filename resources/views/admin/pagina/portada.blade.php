@extends('layouts.admin.app')

@section('title', 'Imagenes de Portada')

@section('css')
  <link rel="stylesheet" href="{{asset('../resources/css/admin/register/form.css')}}">
  <link rel="stylesheet" href="{{asset('../resources/css/admin/perzonalizado/button.css')}}">
  <link rel="stylesheet" href="{{asset('../resources/css/admin/perzonalizado/titulo.css')}}">
  <link rel="stylesheet" href="{{asset('../resources/css/img/stylemulti.css')}}">
  <link rel="stylesheet" href="{{asset('../resources/css/img/imgstyle.css')}}">
@endsection



@section('content')
<section class="higher py-3 bg-lig">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="fw-bold mb-0">Bienvenido al Panel de Creación de Portada</h1>
          <p class="lead text-muted">Revisa bien toda la información antes de guardar</p>
        </div>
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
          <form action="{{route('admin.portada.storeportada')}}" method="POST" id="formulario" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="col-lg-12">
                  <p class="bg-primary-l fw-bold">Imagen<small class="text-muted text-danger"> (Tamaño sugerido: 1500 x 600px)</small></p>
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
                @can('admin.portada.storeportada')
                <div class="form-group col-12 mb-3 text-center">
                  <button class="button fw-bold align-self-center" type="submit">Guardar</button>
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
          <h5 class="fw-bold">Imagenes Guardadas</h5>
        </div>
        <div class="card-body">
          <div class="row">
            @foreach ($portadas as $portada)
              <div class="col col-lg-4 mt-4">
                <form action="{{route('admin.portada.destroy', $portada)}}" class="{{$portada->id}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <div class="imgnoticia">
                    <img src="{{asset($portada->url)}}"> 
                  </div>
                  <div class="img-button text-center">
                    <button class="button fw-bold align-self-center btn-delete" type="submit" id="{{$portada->id}}">Eliminar</button>
                  </div>
                </form>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection



@section('script')
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="{{asset('../resources/js/img/multi/scriptimamulti.js')}}"></script>
  <script src="{{asset('../resources/js/personalizado/button.js')}}"></script>
  <script src="{{asset('../resources/js/admin/scriptList.js')}}"></script>
  @if (session('save')=='ok')
    <script>
      swal({
                title: "¡Bien!",
                text: "¡Imagen Registrada Correctamente!",
                icon: "success",
                button: "OK!",
              });
    </script>
@endif
@endsection