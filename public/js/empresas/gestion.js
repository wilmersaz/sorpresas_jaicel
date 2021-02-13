$(document).ready(function() {
    $('#modal_editar').on('shown.bs.modal', function () {
        $("#nombre_empresa_edit").focus();
    }); 
    $('#modal_crear').on('shown.bs.modal', function () {
        $("#nombre_empresa").focus();
    });
    $("#ciudad_empresa, #ciudad_empresa_edit").select2( {
        language: {
            noResults: function() {return "No hay resultados";},
            searching: function() {return "Buscando..";}
        },
        placeholder: "Seleccione..."
    });
    $('#form_crear').on('submit', function (e) {
        if (e.isDefaultPrevented()) {
        }else{
            e.preventDefault();
            var urlA = baseUrl + "/empresas";
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
                        title: '<strong>La empresa ha sido creada</strong>',
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
            var urlA = baseUrl + "/empresas/" + $('#id_empresa').val();
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
                        title: '<strong>La empresa ha sido actualizada</strong>',
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
        $('#id_empresa').val($(this).data('id'));
        $('#nombre_empresa_edit').val($(this).data('nombreempresa'));
        $('#nit_empresa_edit').val($(this).data('nitempresa'));
        $('#direccion_empresa_edit').val($(this).data('direccionempresa'));
        $('#telefono_empresa_edit').val($(this).data('telefonoempresa'));
        $('#sede_empresa_edit').val($(this).data('sedeempresa'));
        $('#ciudad_empresa_edit').val($(this).data('ciudadempresa'));
        $('#observaciones_empresa_edit').val($(this).data('observacionesempresa'));

        var ciudades = $('#ciudad_empresa_edit').val();
        if (ciudades != null) {
            $('#ciudad_empresa_edit').val(ciudades).trigger("change"); 
        }
        $('#modal_editar').modal('show');
    });
});