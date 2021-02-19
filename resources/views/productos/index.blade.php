@extends('layouts.app')
@section('titulo')Productos @endsection
@section('content')
<div class="card" style="padding: 30px;">
    <div class=" pull-left">
        <a href="{{route('productos.create')}}" class="btn btn-dark btn-elevate btn-pill" title="Crear">
            <span><i class="la la-plus"></i><span>Agregar Producto</span></span>
        </a>
    </div>
    <div class="card-body">
        <table id="productos_table" class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline" style="width:100%">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Estado</th>
                    <th>Categoría</th>
                    <th>Fecha de Creación</th>
                    <th>Imágen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->name }}</td>
                    <td>{{ $producto->description }}</td>
                    <td>{{ $producto->price }}</td>
                    <td>@if($producto->state == 1)
                      <span class="text-success">Activo</span>
                      @else
                      <span class="text-danger">Inactivo</span>
                      @endif
                  </td>
                  <td>{{ $producto->categoria->name }}</td>
                  <td>{{ date("d-m-Y h:i:s", strtotime($producto->created_at)) }}</td>
                  <td>
                    <center>
                        <img id="imagen" src="{{$url}}/{{$producto->image}}" style="width: 20%;">
                    </center>
                </td>
                <td>
                    <div class="btn-group">
                        <a href="{{route('productos.edit', $producto->id)}}" class="btn btn-info m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill m-btn--air" title="Editar">
                            <i class="fas fa-edit"></i> 
                        </a>
                        @if($producto->state == 0)
                        <a href="javascript:();" class="bloquear btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill m-btn--air" data-id="{{$producto->id}}" title="Activar">
                            <i class="fa fa-check-circle"></i> 
                        </a>
                        @else
                        <a href="javascript:();" class="bloquear btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill m-btn--air" data-id="{{$producto->id}}" title="Bloquear">
                            <i class="fas fa-ban"></i> 
                        </a>
                        @endif
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('js/productos/gestion.js') }}"></script>
@endsection