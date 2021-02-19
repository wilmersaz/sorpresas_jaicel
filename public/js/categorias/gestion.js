$(document).ready(function() {

    $('#catergorias_table').DataTable({
      language: {
        url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
    },
    responsive: true,
    pagingType: "full_numbers"
});

    $(document).on('click', '.delete-modal', function() {
        var id = $(this).data('id');
        $('#btnAccion').removeClass('btn-danger');
        $('#btnAccion').removeClass('btn-warning');
        $('#btnAccion').addClass('btn-danger');
        swal.fire({
            title: "¿Esta seguro de eliminar esta Categoría? ",
            text: " Recuerde antes, verificar que no esté vinculada con algún producto.",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Eliminar"
        }).then(function(e) {
            if(e.value){
                var urlA = baseUrl + "/categorias/destroy/" + id;
                jQuery.ajax({
                    url: urlA,
                    type: 'POST',
                    data: {
                        id: id,
                    },beforeSend: function (request) {
                        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                    },success: function(result){
                        if(result == 0){
                            swal.fire({
                                type: 'error',
                                title: 'Error',
                                text: 'Ocurrio un problema al eliminar',
                                footer: '',
                                confirmButtonText:
                                '<i class="fa fa-check"></i> OK!',
                            });
                        }else{
                            swal.fire({
                                title: '<strong>La categoria ha sido eliminada</strong>',
                                type: 'success',
                                html: 'Gracias.',
                                showCloseButton: true,
                                focusConfirm: false,
                                confirmButtonText:
                                '<i class="fa fa-check"></i> OK!',
                            });
                        }
                        location.reload();
                    },
                    error: function(result){
                        swal.fire({
                            type: 'error',
                            title: 'Error',
                            text: 'Ocurrio un problema al eliminar',
                            footer: '',
                            confirmButtonText:
                            '<i class="fa fa-check"></i> Aceptar!',
                        });
                    }
                });
            }
        });
    });
});