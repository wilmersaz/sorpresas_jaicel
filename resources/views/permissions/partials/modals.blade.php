<!--begin:Modal -->
    <div class="modal fade" id="modal_crear" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <form id="form_crear" data-toggle="validator" role ="form" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Permiso</h5>
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
                        <div class="form-group">
                            <label for="display_name">Nombre</label>
                            <input type="text" name="display_name" id="display_name" class="form-control" placeholder="Nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Descripcion</label>
                            <textarea name="description"  class="form-control" id="description" rows="5"></textarea>
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
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Permiso</h5>
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
                    <div class="form-group">
                        <label for="display_name_act">Nombre</label>
                        <input type="text" name="display_name_act" id="display_name_act" class="form-control" placeholder="Nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="description_act">Descripcion</label>
                        <textarea name="description_act"  class="form-control" id="description_act" rows="5"></textarea>
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