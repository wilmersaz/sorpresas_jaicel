$(document).ready(function() {
    $('#modal_editar').on('shown.bs.modal', function () {
        $("#display_name_act").focus();
    }); 
    $('#modal_crear').on('shown.bs.modal', function () {
        $("#display_name").focus();
    });
    $("#permisos, #permisos_act").select2( {
        language: {
            noResults: function() {return "No hay resultados";},
            searching: function() {return "Buscando..";}
        },
        placeholder: "Seleccione..."
    });
    $('#roles_table').DataTable({
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        },
        responsive: true,
        pagingType: "full_numbers"
    });
    $('#form_crear').on('submit', function (e) {
        if (e.isDefaultPrevented()) {
        }else{
            e.preventDefault();
            var urlA = baseUrl + "/roles";
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
                    swal.fire({
                        title: '<strong>El rol ha sido creado</strong>',
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
            var urlA = baseUrl + "/roles/" + $('#id_act').val();
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
                        title: '<strong>El rol ha sido actualizado</strong>',
                        type: 'success',
                        html: 'Gracias.',
                        showCloseButton: true,
                        focusConfirm: false,
                        confirmButtonText:
                        '<i class="fa fa-check"></i> OK',
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
                        '<i class="fa fa-check"></i> OK!',
                    });
                }
            });
        }
    });

    $(document).on('click', '.edit-modal', function() {
        $('#id_act').val($(this).data('id'));
        $('#display_name_act').val($(this).data('display'));
        $('#description_act').val($(this).data('desc'));
        var permisos =$.trim($(this).data('permisos')).split(',');
        $('#permisos_act').val(permisos).trigger('change.select2');
        $('#modal_editar').modal('show');
    });
    $(document).on('click', '.delete-modal', function() {
        var id = $(this).data('id');
        var mensaje = "";
        var boton ="";
        $('#btnAccion').removeClass('btn-danger');
        $('#btnAccion').removeClass('btn-warning');
        $('#btnAccion').addClass('btn-danger');
        boton = "Eliminar";
        mensaje ="¿Esta seguro de eliminar este rol?";
        swal.fire({
            title: "Confirmación",
            text: mensaje,
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: boton
        }).then(function(e) {
            if(e.value){
                var urlA = baseUrl + "/roles/" + id;
                jQuery.ajax({
                    url: urlA,
                    type: 'DELETE',
                    data: {
                        '_token': $('input[name=_token]').val(),
                    },
                    success: function(result){
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
                                title: '<strong>El rol ha sido eliminado</strong>',
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