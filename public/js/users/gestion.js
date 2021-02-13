$(document).ready(function() {
    $('#modal_editar').on('shown.bs.modal', function () {
        $("#name_act").focus();
    }); 
    $('#modal_crear').on('shown.bs.modal', function () {
        $("#name").focus();
    });

    $("#rol, #rol_act, #empresa, #empresa_act").select2( {
        language: {
            noResults: function() {return "No hay resultados";},
            searching: function() {return "Buscando..";}
        },
        placeholder: "Seleccione..."
    });
    
    $(document).on('click', '.edit-modal', function() {
        $('#id_act').val($(this).data('id'));
        $('#name_act').val($(this).data('name'));
        $('#email_act').val($(this).data('email'));
        $('#username_act').val($(this).data('username'));
        $('#cargo_act').val($(this).data('cargo'));
        $('#empresa_act').val($(this).data('empresa'));

        var empresas = $(this).data('empresa');
        if (empresas != null || empresas != '' || empresas != 'undefined') {
        console.log(empresas)
            $('#empresa_act').val(Number(empresas)).trigger("change"); 
        }

        var rol_id = $(this).data('rol')
        if (rol_id.length>1) {
            var rol = rol_id.split(',')
        }else{
            var rol = Number(rol_id);
        }
        $('#rol_act').val(rol).trigger("change");  
        
        $('#modal_editar').modal('show');
    });


    $(document).on('click','.activarUsuario', function(e){
        var id = $(this).data('id');
        $.ajax({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
         },
         url: baseUrl+'/users/activarUsuario',
         type: 'POST',
         data: {id: id},
         dataType: 'json',
         success:(json)=> {
            swal.fire({
                type: 'success',
                title: 'Realizado',
                html: "",
                showCloseButton: true,
                focusConfirm: false,
                timer:2000,
                confirmButtonText:
                '<i class="fa fa-check"></i> Aceptar!',
            });
            location.reload();
        },
        error: function(xhr, ajaxOptions, thrownError) {
            swal.fire({
                type: 'error',
                title: 'Error!!, por favor intente nuevamente.',
                html: "",
                showCloseButton: true,
                focusConfirm: false,
                timer:2000,
                confirmButtonText:
                '<i class="fa fa-check"></i> Aceptar!',
            });
        }   
    }) 
    });

    $('#form_crear').on('submit', function (e) {
        if (e.isDefaultPrevented()) {
        }else{
            e.preventDefault();
            var urlA = baseUrl + "/users";
            jQuery.ajax({
                url: urlA,
                method: 'post',
                data: $('#form_crear').serialize(),
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
                        title: '<strong>El usuario ha sido creado</strong>',
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
            var urlA = baseUrl + "/users/" + $('#id_act').val();
            jQuery.ajax({
                url: urlA,
                type: 'PUT',
                data: $('#form_actualizar').serialize(),
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
                        title: '<strong>El usuario ha sido actualizado</strong>',
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
    $('#formActualizarPefil').on('submit', function (e) {
        if (e.isDefaultPrevented()) {
        }else{
            e.preventDefault();
            var formData = new FormData();
            $.each($('#formActualizarPefil').serializeArray(), function(i, field) {
                formData.append(field.name, field.value);
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var urlA = baseUrl + "/users/actualizar/"+ $('#id_perfil').val();
            jQuery.ajax({
                url: urlA,
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                type: 'POST',
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
                        title: '<strong>El usuario ha sido actualizado</strong>',
                        type: 'success',
                        html: 'Gracias.',
                        showCloseButton: true,
                        focusConfirm: false,
                        confirmButtonText:
                        '<i class="fa fa-check"></i> Aceptar!',
                    });
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
});