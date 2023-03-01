@extends('layouts.admin.app')

@section('title', 'Editar Roles de Usuario')

@section('css')
<link rel="stylesheet" href="{{asset('../resources/css/admin/perzonalizado/checkbox.css')}}">
<link rel="stylesheet" href="{{asset('../resources/css/admin/perzonalizado/button.css')}}">
<link rel="stylesheet" href="{{asset('../resources/css/admin/perzonalizado/titulo.css')}}">
@endsection



@section('content')
<section class="higher pt-3 bg-lig">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <h1 class="fw-bold mb-0">Bienvenido al Panel de Edición de Rol de Usuario</h1>
          <p class="lead text-muted">Revisa bien toda la información antes de guardar</p>
        </div>
        @can('admin.user.showUserList')
        <div class="col-lg-3 d-flex">
          <a class="btn button fw-bold align-self-center" href="{{route('admin.user.showUserList')}}">Ver Usuarios Registrados</a>
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
        <div class="container">
        <div class="row checkbox">
          <h6 class="fw-bold">Roles de {{$user->name}}</h6>
          {!! Form::model($user, ['route' => ['admin.user.update', $user], 'method' => 'put']) !!}
            @foreach ($roles as $role)
                    @if ($user->tipousuario_id=='2')
                      @if ($role->id=='2')
                      <div class="col col-lg-3 col-md-4 col-sm-6 col-12 my-1 fw-bold">
                        {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1','id' => $role->id]) !!}
                        <label for="{{$role->id}}">
                          {{$role->name}}
                        </label>
                      </div>
                      @endif
                    @else
                    @if ($role->id!='2')
                    <div class="col col-lg-3 col-md-4 col-sm-6 col-12 my-1 fw-bold">
                      {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1','id' => $role->id]) !!}
                      <label for="{{$role->id}}">
                        {{$role->name}}
                      </label>
                    </div>
                      @endif
                    @endif
            @endforeach
              </div>
            </div>
            @can('admin.user.update')
              <button type="submit" class="button fw-bold align-self-center my-2"> Asignar Rol</button>
            @endcan
          {!! Form::close() !!}
        </div>
    </div>
  </section>
@endsection



@section('script')
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="{{asset('../resources/js/personalizado/button.js')}}"></script>
  @if (session('info')=='ok')
    <script>
      swal({
                title: "¡Bien!",
                text: "¡Acaba de Editar Correctamente el Rol del Usuario!",
                icon: "success",
                button: "OK!",
              });
    </script>
@endif
@endsection