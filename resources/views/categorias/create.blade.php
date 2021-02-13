@extends('layouts.app')
@section('titulo')Crear Categoría @endsection
@section('content')
<br>
<div class="card" style="padding: 50px;">
    <div class="col-lg-6 col-md-8 mx-auto center-block shadow p-3 mb-5 bg-white rounded">
        <h3 class="m-portlet__head-text text-primary">
            Agregar Categoría 
        </h3>
        <hr>
        <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="{{route('categorias.store')}}" id="FormStore">
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
            <div align="center" class="m-portlet__foot m-portlet__foot--fit">
                <div class="m-form__actions">
                    <input type="submit" class="btn btn-success finish" id="finish" value="Guardar">
                    <button type="reset" class="btnCancelar btn btn-secondary">
                        Restablecer
                    </button>
                    <div class="btn btn-danger" style="cursor: pointer;" onclick="window.location.href=baseUrl+'/categorias/';">
                        Regresar
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection