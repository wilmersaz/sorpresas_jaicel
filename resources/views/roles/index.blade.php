@extends('layouts.app')
@section('titulo')Roles @endsection
@section('content')
<div class="card" style="padding: 30px;">
    <div class="card-body">
        @ability('admin', 'crear_rol')
        <div class="m-portlet__head-tools">
            <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
                <li class="m-portlet__nav-item">
                    <a href="#" data-toggle="modal" data-target="#modal_crear" class="btn btn-dark btn-elevate btn-pill" title="Agregar">
                        <span><i class="la la-plus"></i><span>Agregar Rol</span></span>
                    </a>
                </li>
            </ul>
        </div>
        @endability
        <table id="roles_table" class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $rol)
                    <tr>
                        <td>{{ $rol->display_name }}</td>
                        <td>{{ $rol->description }}</td>
                        <td>
                            <div class='btn-group'>
                                    @ability('admin', 'editar_rol')
                                    <a href="javascript:void(0)" class="edit-modal btn btn-brand  m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill m-btn--air"  data-id="{{$rol->id}}" data-display="{{ $rol->display_name }}" data-desc="{{ $rol->description }}" data-permisos="<?php $datos ="";
                                    foreach ($rol->permissions as $key => $permiso){ ?>
                                        <?php if($datos==""){
                                            $datos .= $permiso->pivot->permission_id;
                                        }else{
                                            $datos .=','.$permiso->pivot->permission_id;
                                        } ?>
                                    <?php } echo trim($datos); ?> " title="Editar">
                                        <i class="fa flaticon-edit-1"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="delete-modal btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill m-btn--air" data-id="{{$rol->id}}" title="Eliminar">
                                        <i class="fa flaticon-delete-1"></i>
                                    </a>
                                    @endability
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @include('roles.partials.modals')
    </div>
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('js/roles/gestion.js') }}"></script>
@endsection