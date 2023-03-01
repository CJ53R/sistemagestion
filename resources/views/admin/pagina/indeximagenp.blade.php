@extends('layouts.admin.app')

@section('title', 'Lista Imágenes de Página')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap5.min.css">
  <link rel="stylesheet" href="{{asset('../resources/css/admin/list/table.css')}}">
  <link rel="stylesheet" href="{{asset('../resources/css/admin/perzonalizado/button.css')}}">
@endsection



@section('content')
  <section class="higher py-3 bg-lig">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="fw-bold mb-0">Bienvenido al Panel de Lista de Imágenes de la Página</h1>
          <p class="lead text-muted">Usa el buscador para búsquedas más precisas</p>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-mix pt-4 mb-4">
    <div class="container">
        <div class="card">
            <div class="card-body">

        <table id="estudiante"  class="table table-striped estudiante">
            <thead class="pbg-primary">
                <tr class="text-white">
                  <th scope="col">ID</th>
                   <th scope="col">Parte de la página</th>
                   <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody class="fw-bold">

            </tbody>
            <tfoot class="pbg-primary">
                <tr class="text-white">
                  <th scope="col">ID</th>
                  <th scope="col">Parte de la página</th>
                   <th scope="col">Acciones</th>
                </tr>
            </tfoot>
        </table>
    </div>
  </div>
    </div>
  </section>
@endsection


@section('script')
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> 
  <script src="{{asset('../resources/js/admin/scriptList.js')}}"></script>
  <script src="{{asset('../resources/js/personalizado/button.js')}}"></script>
  
 <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
 <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
 <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js"></script>
 @if (session('eliminar')=='ok')
     <script>
        swal("¡El Registro Fue Eliminado Con Éxito!", {
                icon: "success",
                });
     </script>
 @endif
 <script>
  $(document).ready(function () {

$('.estudiante').DataTable({
  processing: true,
  serverSide: true,
  responsive: true,
  autoWidth: false, 
  ajax: "{{asset(route('admin.imagenp.showDataImagenpList'))}}",
  dataType: 'json',
  type: "POST",
  columns: [
    {data: 'id', name: 'id'},
    {data: 'nombrep', name: 'nombrep'},
    {data: 'actions', name: 'actions', searchable: false,orderable: false},
  ],

  lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Todos"]],
        "language": {
            "lengthMenu": "Mostrar _MENU_  registros por página",
            "zeroRecords": "Nada encontrado - disculpa",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros encontrados",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar",
            "paginate": {
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
});
});
 </script>


@endsection