@extends('layouts.admin.app')

@section('title', 'Edición de Foto de Perfil')

@section('css')
  <link rel="stylesheet" href="{{asset('../resources/css/img/styles.css')}}">
  <link rel="stylesheet" href="{{asset('../resources/css/admin/perzonalizado/button.css')}}">
@endsection



@section('content')
<section class="higher py-3 bg-lig">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <h1 class="fw-bold mb-0">{{auth()->user()->name}}</h1>
          <p class="lead text-muted">Revisa bien la imagen antes de guardar</p>
        </div>
      </div>
    </div>
  </section>

<section class=" bg-mix mb-4">
    <div class="container">
       <div class="card">
          <form action="{{route('user.avatar.store', auth()->user())}}" enctype="multipart/form-data" method="POST" id="formulario">
            @csrf
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
                @if (auth()->user()->avatar_id=='')
                <button class="button fw-bold align-self-center" type="submit">Subir Foto</button>
                @else
                <button class="button fw-bold align-self-center" type="submit">Editar Foto</button>
                @endif
              </div>
              @endcan
            </div>
          </form>
          @can('user.avatar.destroy')
            @if (auth()->user()->avatar_id!='')
            <div class="form-group col-12 mb-3 text-start mx-4">
            <form action="{{route('user.avatar.destroy', auth()->user())}}" method="POST" class="formularioimg">
              @csrf
              @method('DELETE')
              <button class="button fw-bold align-self-center" type="submit">Eliminar Foto</button>
            </form>
            </div>
            @endif
          @endcan
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