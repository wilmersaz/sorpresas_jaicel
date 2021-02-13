<!--begin:Modal -->
    <div class="modal fade" id="modal_crear" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <form id="form_crear" data-toggle="validator" role ="form" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Rol</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger" style="display:none">
                            <ul class="list-errores"></ul>
                        </div>
                        {{ csrf_field() }}
                        <!-- Tipo Documento Field -->
                        <div class="form-group m-form__group row">
                            <label for="display_name">Nombre</label>
                            <input type="text" name="display_name" id="display_name" class="form-control" placeholder="Nombre" required>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="description">Descripción</label>
                            <textarea name="description"  class="form-control" id="description" rows="3"></textarea>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="permisos">Permisos</label>
                            {{ Form::select('permisos[]', $permissions, null, ['class'=> 'form-control m-select2', 'id'=>'permisos', 'required' => 'true', 'multiple' =>'multiple', 'style'=>'width:100%;']) }}
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
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Rol</h5>
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
                    <div class="form-group m-form__group row">
                        <label for="display_name_act">Nombre</label>
                        <input type="text" name="display_name_act" id="display_name_act" class="form-control" placeholder="Nombre" required>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="description_act">Descripción</label>
                        <textarea name="description_act"  class="form-control" id="description_act" rows="3"></textarea>
                    </div>
                    <div class="form-group m-form__group row">
                            <label for="description">Permisos</label>
                            {{ Form::select('permisos_act[]', $permissions, null, ['class'=> 'form-control m-select2', 'id'=>'permisos_act', 'required' => 'true', 'multiple' =>'multiple', 'style'=>'width:100%;']) }}
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