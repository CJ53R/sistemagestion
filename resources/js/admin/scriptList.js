$(document).ready(function () {
    
    $(document).on("click", ".btn-delete", function(e){
        e.preventDefault();
          btn_id = $(this).attr('id');
            swal({
                title: "¿Estas seguro de eliminar registro?",
                text: "Una vez eliminado, ¡no podrá recuperar este registro!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                  $('.'+btn_id).submit();
                } else {
                    swal("¡No se realizo operación!");
                }
            });
        });
});