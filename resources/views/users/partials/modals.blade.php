<!--begin::Modal-->
<div class="modal fade" id="modal_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titulo_modal_info"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                   <div class="col-md-6" id="name_info">
                       <strong>Nombre:</strong>
                   </div>
                   <div class="col-md-6" id="username_info">
                    <strong>Nombre de usuario:</strong>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6" id="email_info">
                    <strong>Email</strong>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6" id="activo_info">
                    <strong>Empresa:</strong>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6" id="cargo_info">
                    <strong>Cargo:</strong>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
</div>
</div>
<!--end::Modal-->
<!--begin:Modal -->
<div class="modal fade" id="modal_crear" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form id="form_crear" data-toggle="validator" role ="form" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none">
                        <ul class="list-errores"></ul>
                    </div>
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nombre Completo" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username">Nombre de usuario</label>
                                <div class="m-input-icon m-input-icon--left">
                                    <input type="text" name="username" id="username" class="form-control m-input" placeholder="nombre.apellido" data-remote="/users/validarNombre/" data-error="El nombre ya ha sido registrado" required>
                                    <span class="m-input-icon__icon m-input-icon__icon--left"><span><i class="la la-user"></i></span></span>
                                </div>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <div class="m-input-icon m-input-icon--left">
                                    <input type="email" name="email" id="email" class="form-control m-input" placeholder="Correo electronico" required>
                                    <span class="m-input-icon__icon m-input-icon__icon--left"><span><i class="la la-at"></i></span></span>
                                </div>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="empresa">Empresa</label>
                                {!!Form::select('empresa', $empresas, null,['class'=> 'form-control m-select2', 'name'=>'empresa', 'style' => 'width:100%!important;', 'id'=>'empresa']) !!}
                                <div class="help-block with-errors">
                                   <span class="m-input-icon__icon m-input-icon__icon--left"><span><i class="la la-industry"></i></span></span>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="rol">Rol</label>
                            {!!Form::select('rol', $roles, null,['class'=> 'form-control m-select2', 'id'=>'rol', 'name'=>'rol[]','multiple'=>'multiple', 'style' => 'width:100%!important;','required' => 'true']) !!}
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cargo">Cargo</label>
                            <div class="m-input-icon m-input-icon--left">
                                <input type="text" name="cargo" id="cargo" class="form-control m-input" placeholder="Cargo" required>
                            </div>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                {{ Form::submit('Registrar', array('class' => 'btn btn-primary')) }}
            </div>
        </form>
    </div>
</div>
</div>
<!--end:Modal -->
<!--begin:Modal -->
<div class="modal fade" id="modal_editar" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form id="form_actualizar" data-toggle="validator" role ="form" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none">
                        <ul class="list-errores"></ul>
                    </div>
                    {{ csrf_field() }}
                    <input type="hidden" name="id_act" id="id_act">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name_act">Nombre</label>
                                <input type="text" name="name_act" id="name_act" class="form-control" placeholder="Nombre" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username_act">Nombre de usuario</label>
                                <div class="m-input-icon m-input-icon--left">
                                    <input type="text" name="username_act" id="username_act" class="form-control m-input" placeholder="Nombre de usuario" required>
                                    <span class="m-input-icon__icon m-input-icon__icon--left"><span><i class="la la-user"></i></span></span>
                                </div>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email_act">Email</label>
                                <div class="m-input-icon m-input-icon--left">
                                    <input type="email" name="email_act" id="email_act" class="form-control m-input" placeholder="Email" required>
                                    <span class="m-input-icon__icon m-input-icon__icon--left"><span><i class="la la-at"></i></span></span>
                                </div>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="empresa_act">Empresa</label>
                                {!!Form::select('empresa_act', $empresas, null,['class'=> 'form-control', 'id'=>'empresa_act','name'=>'empresa_act',old('empresa_act'), 'style' => 'width:100%!important;']) !!}
                                <div class="help-block with-errors">
                                    <span class="m-input-icon__icon m-input-icon__icon--left"><span><i class="la la-industry"></i></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6" id="rol_actualizacion">
                            <div class="form-group">
                                <label for="rol_act">Rol</label>
                                {!!Form::select('rol_act', $roles, null,['class'=> 'form-control', 'id'=>'rol_act', 'name'=>'rol_act[]', collect(old('rol_act[]'))->contains($roles)?'selected':'', 'style' => 'width:100%!important;','multiple'=>'multiple','required' => 'true']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cargo_act">Cargo</label>
                                <input type="text" name="cargo_act" id="cargo_act" class="form-control" placeholder="cargo" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    {{ Form::submit('Actualizar', array('class' => 'btn btn-primary')) }}
                </div>
            </form>
        </div>
    </div>
</div>
<!--end:Modal -->


<!--begin:Modal -->
<div class="modal fade" id="activarUsuario" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="form_activar" data-toggle="validator" role ="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bloquear Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" style="display:none">
                        <ul class="list-errores"></ul>
                    </div>
                    <input type="hidden" name="id_usuario" id="id_usuario">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="motivo_bloqueo">Motivo</label>
                                <textarea name="motivo_bloqueo" id="motivo_bloqueo" class="form-control" placeholder="Motivo por el cual bloquea este usuario" required rows="5"></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    {{ Form::submit('Bloquear', array('class' => 'btn btn-danger')) }}
                </div>
            </form>
        </div>
    </div>
</div>
<!--end:Modal -->