@extends('layouts.admin.app')

@section('title', 'Subir Imagenes')

@section('css')
  <link rel="stylesheet" href="{{asset('../resources/css/img/styles.css')}}">
  <link rel="stylesheet" href="{{asset('../resources/css/admin/perzonalizado/button.css')}}">
  <link rel="stylesheet" href="{{asset('../resources/css/img/imgstyle.css')}}">
@endsection



@section('content')
<section class="higher py-3 bg-lig">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <p class="lead text-muted">Revisa bien la imagen antes de guardar</p>
        </div>
        @can('admin.imagenp.index')
        <div class="col-lg-3 d-flex">
          <a class="btn button fw-bold align-self-center" href="{{route('admin.imagenp.index')}}">Ver Lista</a>
        </div>
        @endcan
      </div>
    </div>
  </section>

<section class=" bg-mix mb-4">
    <div class="container">
       <div class="card">
          <form action="{{route('admin.imagenp.update', $imagenpag)}}" enctype="multipart/form-data" method="POST" id="formulario">
            @csrf
            @method('put')
            <div class="card-body">
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
              @can('user.avatar.store')
              <div class="form-group col-12 text-start mx-2 mt-2">
                <button class="button fw-bold align-self-center" type="submit">Editar</button>
              </div>
              @endcan
            </div>
          </form>
        </div>

        <div class="card mt-4">
          <div class="img-title text-center mt-2">
            <h5 class="fw-bold">Portada Actual de {{$imagenpag->nombrep}}</h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col col-lg-4 mt-4">
                <div class="imgnoticia">
                  <img src="{{asset($imagenpag->url)}}"> 
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </section>
@endsection



@section('script')
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="{{asset('../resources/js/img/only/scriptimg.js')}}"></script>
  <script src="{{asset('../resources/js/personalizado/button.js')}}"></script>
  @if (session('info')=='edit')
    <script>
      swal({
                title: "¡Bien!",
                text: "¡Foto correctamente editada!",
                icon: "success",
                button: "OK!",
              });
    </script>
@endif

@if (session('info')=='ok')
    <script>
      swal({
                title: "¡Bien!",
                text: "¡Foto correctamente subida!",
                icon: "success",
                button: "OK!",
              });
    </script>
@endif

@if (session('info')=='delete')
    <script>
      swal({
                title: "¡Bien!",
                text: "¡Foto Eliminada!",
                icon: "success",
                button: "OK!",
              });
    </script>
@endif

<script >
    
  $('.formularioimg').submit(function(e){
      e.preventDefault();
      swal({
          title: "¿Estas seguro de eliminar foto de perfil?",
          text: "Una vez eliminado, ¡no podrá recuperar imagen!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
          })
          .then((willDelete) => {
          if (willDelete) {
              this.submit();
          } else {
              swal("¡No se realizo operación!");
          }
      });
  });
</script>
@endsection