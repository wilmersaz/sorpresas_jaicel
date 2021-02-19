@extends('layouts.app')
@section('titulo')Crear Producto @endsection
@section('content')
<br>
<div class="card" style="padding: 50px;">
    <div class="col-lg-6 col-md-8 mx-auto center-block shadow p-3 mb-5 bg-white rounded">
        <h3 class="m-portlet__head-text text-primary">
            Agregar Producto 
        </h3>
        <hr>
        <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="{{route('productos.store')}}" id="FormStore" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="m-portlet__body">
                <div class="form-group ">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">
                <div class="form-group ">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Descripción</label>
                                <input type="text" name="description" id="description" class="form-control" placeholder="Descripción" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">
                <div class="form-group ">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="price">Precio</label>
                                <input type="text" name="price" id="price" class="form-control" placeholder="Precio" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">
                <div class="form-group ">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="category">Categoría</label>
                                {{ Form::select('category', $categorias, null, ['class'=> 'form-control', 'id'=>'category', 'required' => 'true', 'placeholder' => 'Seleccione...', 'style'=>'width:100%;']) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">
                <div class="form-group ">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="image">Imágen</label>
                            <div class="upload_image custom-file col-md-12">
                                <input type="file" class="custom-file-input form-control" id="image" name="image" lang="es" accept="image/*" style="cursor: pointer;" required>
                                <label class="custom-file-label" for="image" data-browse="Escoger">
                                    Seleccione imágen
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div align="center" class="m-portlet__foot m-portlet__foot--fit">
                <div class="m-form__actions">
                    <input type="submit" class="btn btn-success finish" id="finish" value="Guardar">
                    <button type="reset" class="btnCancelar btn btn-secondary">
                        Restablecer
                    </button>
                    <div class="btn btn-danger" style="cursor: pointer;" onclick="window.location.href=baseUrl+'/productos/';">
                        Regresar
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection