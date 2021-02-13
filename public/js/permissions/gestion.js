$(document).ready(function() {
    $('#modal_editar').on('shown.bs.modal', function () {
        $("#display_name_act").focus();
    }); 
    $('#modal_crear').on('shown.bs.modal', function () {
        $("#display_name").focus();
    });
    $('#form_crear').on('submit', function (e) {
        if (e.isDefaultPrevented()) {
        }else{
            e.preventDefault();
            var urlA = baseUrl + "/permisos";
            jQuery.ajax({
                url: urlA,
                method: 'post',
                data: $('#form_crear').serialize(),
                beforeSend: function() {
                },
                success: function(result){
                    if(result == 0){
                        swal.fire({
                            type: 'error',
                            title: 'Error',
                            text: 'Ocurrio un problema al guardar',
                            footer: '',
                            confirmButtonText:
                            '<i class="fa fa-check"></i> Aceptar!',
                        });
                    }
                    $("#form_actualizar").find('input:text, select').val('');
                    swal.fire({
                        title: '<strong>Se registro el permiso</strong>',
                        type: 'success',
                        html: 'Gracias.',
                        showCloseButton: true,
                        focusConfirm: false,
                        confirmButtonText:
                        '<i class="fa fa-check"></i> Aceptar!',
                    });
                    location.reload();
                },
                error: function(result){
                    var lista = "<ul>";
                    jQuery.each(result.responseJSON.errors, function(key, value){
                        lista += "<li>" + value + "</li>";
                    });
                    lista += "</ul>";
                    swal.fire({
                        type: 'error',
                        title: 'Error',
                        html: lista,
                        showCloseButton: true,
                        focusConfirm: false,
                        confirmButtonText:
                        '<i class="fa fa-check"></i> Aceptar!',
                    });
                }
            });
        }
    });
    $('#form_actualizar').on('submit', function (e) {
        if (e.isDefaultPrevented()) {
        }else{
            e.preventDefault();
            var urlA = baseUrl + "/permisos/" + $('#id_act').val();
            jQuery.ajax({
                url: urlA,
                type: 'PUT',
                data: $('#form_actualizar').serialize(),
                beforeSend: function() {
                },
                success: function(result){
                    if(result == 0){
                        swal.fire({
                            type: 'error',
                            title: 'Error',
                            text: 'Ocurrio un problema al guardar',
                            footer: '',
                            confirmButtonText:
                            '<i class="fa fa-check"></i> Aceptar!',
                        });
                    }
                    $("#form_actualizar").find('input:text, select').val('');
                    swal.fire({
                        title: '<strong>Se ha actualizado el nombre del permiso</strong>',
                        type: 'success',
                        html: 'Gracias.',
                        showCloseButton: true,
                        focusConfirm: false,
                        confirmButtonText:
                        '<i class="fa fa-check"></i> Aceptar!',
                    });
                    location.reload();
                },
                error: function(result){
                    var lista = "<ul>";
                    jQuery.each(result.responseJSON.errors, function(key, value){
                        lista += "<li>" + value + "</li>";
                    });
                    lista += "</ul>";
                    swal.fire({
                        type: 'error',
                        title: 'Error',
                        html: lista,
                        showCloseButton: true,
                        focusConfirm: false,
                        confirmButtonText:
                        '<i class="fa fa-check"></i> Aceptar!',
                    });
                }
            });
        }
    });

    $(document).on('click', '.edit-modal', function() {
        $('#id_act').val($(this).data('id'));
        $('#display_name_act').val($(this).data('display'));
        $('#description_act').val($(this).data('desc'));
        $('#modal_editar').modal('show');
    });
});

