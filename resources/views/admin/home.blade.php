@extends('layouts.admin.app')

@section('title', 'Inicio')

@section('css')
    
@endsection



@section('content')

<section class="bg-mix pt-3">
    <div class="container">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 d-flex stat my-3">
              <div class="mx-auto">
                <h6 class="text-muted">Plana Docente</h6>
                <h3 class="fw-bold">{{$docentes->count()}}</h3>
                <h6 class="text-success fw-bold"><i class="fa fa-check-circle" aria-hidden="true"></i> Docentes</h6>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 d-flex stat my-3">
              <div class="mx-auto">
                <h6 class="text-muted">Sub Direcciones</h6>
                <h3 class="fw-bold">{{$sub->count()}}</h3>
                <h6 class="text-success fw-bold"><i class="fa fa-check-circle" aria-hidden="true"></i> Sub Directores</h6>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 d-flex stat my-3">
              <div class="mx-auto">
                <h6 class="text-muted">Auxiliares de Educación</h6>
                <h3 class="fw-bold">{{$auxeducacion->count()}}</h3>
                <h6 class="text-success fw-bold"><i class="fa fa-check-circle" aria-hidden="true"></i> Auxiliares</h6>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 d-flex my-3">
              <div class="mx-auto">
                <h6 class="text-muted">Total de Trabajadores</h6>
                <h3 class="fw-bold">{{$trabajadores->count()-1}}</h3>
                <h6 class="text-success fw-bold"><i class="fa fa-check-circle" aria-hidden="true"></i> Trabajadores</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection



@section('script')
    
@endsection