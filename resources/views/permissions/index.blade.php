@extends('layouts.app')
@section('titulo')Permisos @endsection
@section('content')
<div class="card" style="padding: 30px;">
    <div class="card-body">
        <div class="m-portlet__head-tools">
            <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
                @ability('admin', 'crear_permiso')
                    <li class="m-portlet__nav-item">
                        <a href="#" data-toggle="modal" data-target="#modal_crear" class="btn btn-dark btn-elevate btn-pill">
                            <span><i class="la la-plus"></i><span>Agregar Permiso</span></span>
                        </a>
                    </li>
                @endability
            </ul>
        </div>
        <table id="permisos_table" class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
        @include('permissions.partials.modals')
    </div>
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#permisos_table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url":"{{ route('permissionsIndex') }}",
                "dataType":"json",
                "type":"GET",
                "data":{"_token":"{{ csrf_token() }}"}
            },
            columns: [{
                data: "display_name",
                title: "nombre",
                width: 100,
                height:100,
            },{
                data: "description",
                title: "Descripcion",
                width: 100,
                height:100,
            },{
                data: "action",
                title: "Acciones",
                width: 100,
                height:100,
                render: function (data,type,full,meta) {
                    return `@ability('admin', 'actualizar_permisos_permisos') 
                    <a href="javascript:void(0)" class="edit-modal btn btn-brand  m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill m-btn--air" title="Editar" data-id="${data.id}" data-display="${data.display_name}" data-desc="${data.description}">
                                <i class="fa flaticon-edit-1"></i>
                            </a>
                            @endability`;

                },
                orderable: false
            }],
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            },
            responsive: true,
            pagingType: "full_numbers"
        });
    });
</script>
<script src="{{ asset('js/permissions/gestion.js') }}"></script>
@endsection


