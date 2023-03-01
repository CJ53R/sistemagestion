@extends('layouts.admin.app')

@section('title', 'Registro de Cliente')

@section('css')
  <link rel="stylesheet" href="{{asset('../resources/css/admin/register/form.css')}}">
@endsection



@section('content')
<section class="higher py-3 bg-lig">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <h1 class="fw-bold mb-0">Bienvenido a la lista de roles</h1>
          <p class="lead text-muted">Use buscador para encontrar el dato</p>
        </div>
        @can('admin.role.create')
        <div class="col-lg-3 d-flex">
          <a class="btn btn-custom fw-bold align-self-center" href="{{route('admin.role.create')}}">Registrar Nuevo Rol</a>
        </div>
        @endcan
      </div>
    </div>
  </section>
<section class="mt-4 mb-4">
    <div class="container">
       <div class="card">
          
        </div>
    </div>
  </section>
@endsection



@section('script')
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@endsection