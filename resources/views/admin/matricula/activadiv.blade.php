@extends('layouts.admin.app')

@section('title', 'Activa Matrícula')

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
          <h1 class="fw-bold mb-0">Bienvenido al Panel de Activar Matricula en la Página</h1>
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
          <form action="{{route('admin.updatediv.matricula', $div)}}" method="POST" id="formulario">
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
                @can('admin.updatediv.matricula')
                <div class="form-group col-12 mb-3 text-center">
                  <button class="button fw-bold align-self-center" type="submit">Editar</button>
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
  <script src="{{asset('../resources/js/admin/scriptactivamatricula.js')}}"></script>
  <script src="{{asset('../resources/js/personalizado/button.js')}}"></script>
  @if (session('edit')=='ok')
    <script>
      swal({
                title: "¡Bien!",
                text: "¡Acaba de Editar Correctamente el Estado de Div Matrícula!",
                icon: "success",
                button: "OK!",
              });
    </script>
@endif
@endsection