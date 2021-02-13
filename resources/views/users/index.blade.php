@extends('layouts.app')
@section('titulo')Usuarios @endsection
@section('content')
<div class="card" style="padding: 30px;">
    <div class="">
        @ability('admin', 'crear_usuario')
        <div class="pull-left">
            <a href="#" data-toggle="modal" data-target="#modal_crear" class="btn btn-dark btn-elevate btn-pill" title="Agregar">
                <span><i class="la la-plus"></i><span>Agregar Usuario</span></span>
            </a>
        </div>
        @endability
        @ability('admin', 'exportar_usuario')
        <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="{{route('reporteUsuarios')}}" id="myForm">
            {{csrf_field()}}
            <div class=" pull-right">
                <button class="btn btn-success btn-elevate btn-pill" title="Exportar">
                    <span><i class="fas fa-file-excel"></i><span>Exportar</span></span>
                </button>
            </div>
        </form>
        @endability
    </div>
    <div class="card-body">
        <table id="users_table" class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Nombre de usuario</th>
                    <th>Email</th>
                    <th>Empresa</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
        @include('users.partials.modals')
    </div>
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#users_table').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [[ 0, "asc" ]],
            "ajax": {
                "url":"{{ route('usersIndex') }}",
                "dataType":"json",
                "type":"GET",
                "data":{"_token":"{{ csrf_token() }}"}
            },
            columns: [{
                data: "name",
                title: "Nombre",
                width: 100,
                height:100,
            },{
                data: "username",
                title: "Nombre de Usuario",
                width: 100,
                height:100,
            },{
                data: "email",
                title: "Email",
                width: 100,
                height:100,
            },{
                data: "empresa_id",
                title: "Empresa",
                width: 100,
                height:100,
            },{
                data: "action",
                title: "Acciones",
                width: 100,
                height:100,
                render: function (data,type,full,meta) {
                    var arrayRoles = [];
                    var keys = Object.values(data.roles_id);
                    keys.forEach((item,index) => {
                        arrayRoles.push(item.nombre_rol.id)
                    // console.log(item.nombre_rol.id)
                });
                    return `<div class='btn-group'>
                    @ability('admin', 'editar_usuario')

                    <a href="javascript:void(0)" class="edit-modal btn btn-brand  m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill m-btn--air"  data-id="${data.id}" data-name=" ${data.name}" data-username=" ${data.username}" data-email=" ${data.email}" data-cargo=" ${data.cargo }" data-empresa=" ${data.empresa_id }"  data-rol="${arrayRoles}" title="Editar">
                    <i class="fa flaticon-edit-1"></i>
                    </a>
                    @endability
                    @ability('admin', 'bloquear_usuario')`+
                    ((data.estado == 0)?
                        `<a href="javascript:void(0)" class="activarUsuario btn btn-success  m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill m-btn--air" data-toggle="kt-tooltip" data-container="body"  data-placement="left" title="" data-original-title="Activar" data-id="${data.id}">
                        <i class="fa fa-check-circle"></i> 
                        </a>`
                        :
                        `<a href="javascript:void(0)" class="activarUsuario btn btn-danger  m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill m-btn--air" data-toggle="kt-tooltip" data-container="body"  data-placement="left" title="" data-original-title="Bloquear" data-id="${data.id}">
                        <i class="fas fa-ban"></i> 
                        </a>`)+
                    `@endability
                    </div>`;

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
<script src="{{ asset('js/users/gestion.js') }}"></script>
@endsection