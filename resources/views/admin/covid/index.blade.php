@extends('layouts.admin.app')

@section('title', 'Formulario Covid')

@section('css')
  <link rel="stylesheet" href="{{asset('../resources/css/admin/perzonalizado/button.css')}}">
  <link rel="stylesheet" href="{{asset('../resources/css/admin/perzonalizado/titulo.css')}}">
@endsection



@section('content')
<section class="higher py-3 bg-lig">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="fw-bold mb-0">Bienvenido al Panel de Edición de Vista Covid-19</h1>
          <p class="lead text-muted">Revisa bien toda la información antes de guardar</p>
        </div>
      </div>
    </div>
  </section>
<section class="bg-mix mb-4">
    <div class="container">
       <div class="card">
        <div class="form-group col-12 text-center mt-4">
          <h5 class="fw-bold">Documento para protocolos de Covid 19</h5>
          <hr class="line mx-auto">
        </div>
          <form action="{{route('admin.covid.subirpdf', $covid)}}" method="POST" id="formulario" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-body">
              <div class="row">
                <div class="form-group col-lg-4 col-md-4 col-12 mb-3">
                  <input type="file" accept="application/pdf"  name="file" value="{{old('file')}}" id="file">
                </div>
                

                @can('admin.covid.subirpdf')
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
  <script src="{{asset('../resources/js/personalizado/button.js')}}"></script>
  @if (session('editpdf')=='ok')
    <script>
      swal({
                title: "¡Bien!",
                text: "¡Edito el Documento de Protocolos de Covid Correctamente!",
                icon: "success",
                button: "OK!",
              });
    </script>
@endif
@endsection