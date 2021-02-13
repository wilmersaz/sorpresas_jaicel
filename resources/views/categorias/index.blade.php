@extends('layouts.app')
@section('titulo')Categorias @endsection
@section('content')
<div class="card" style="padding: 30px;">
    <div class=" pull-left">
        <a href="{{route('categorias.create')}}" class="btn btn-dark btn-elevate btn-pill" title="Crear">
            <span><i class="la la-plus"></i><span>Agregar Ciudad</span></span>
        </a>
    </div>
    <div class="card-body">
        <table id="catergorias_table" class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline" style="width:100%">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Fecha de Creación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->name }}</td>
                    <td>{{ $categoria->description }}</td>
                    <td>{{ date("d-m-Y h:i:s", strtotime($categoria->created_at)) }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{route('categorias.edit', $categoria->id)}}" class="btn btn-info m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill m-btn--air" title="Editar">
                                <i class="fas fa-edit"></i> 
                            </a>
                            <a  data-toggle="modal" class="delete-modal btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill m-btn--air" data-id="{{$categoria->id}}" title="Eliminar"  href="#">
                                <i class="fa flaticon-delete-1"></i> 
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('js/categorias/gestion.js') }}"></script>
@endsection