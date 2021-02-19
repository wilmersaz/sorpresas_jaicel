@extends('layouts.app')
@section('titulo')Contáctanos @endsection
@section('content')
<style>
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
        -webkit-appearance: none; 
        margin: 0; 
    }
</style>
<div class="m-grid m-grid--hor m-grid--root m-page">
    <div class="card" style="padding: 30px;">
        @if ($mensaje=Session::get('success'))
        <div class="alert alert-success">
            {{$mensaje}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="padding-top: 0rem;">
            </button>
        </div>
        @endif
        <div style="padding-top: 1%" class="row">
            <div class="col-md-4 mx-auto shadow m-portlet m-portlet--tab">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>
                            <h3 class="m-portlet__head-text">
                                Contáctanos 
                            </h3>
                        </div>
                    </div>
                </div>
                <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="{{route('contacto.store')}}" id="FormStore">
                    {{csrf_field()}}
                    <div class="m-portlet__body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label >Nombre</label>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="la la-user"></i></span></div>
                                    <input type="text" class="form-control" placeholder="Nombre" id="name" name="name" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Teléfono</label>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="la la-phone"></i></span></div>
                                    <input type="number" class="blockNums form-control m-input" placeholder="Teléfono" id="telephone" name="telephone" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend kt-font-brand"><span class="input-group-text">@</span></div>
                                    <input type="email" class="form-control m-input" placeholder="Correo Electrónico" id="email" name="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Observación</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions">
                            <div class="row">
                                <div class="col-2"></div>
                                <div class="col-10">
                                    <button type="submit" class="btn btn-primary">
                                        Enviar
                                    </button>
                                    <button type="reset" class="btn btn-secondary">
                                        Cancelar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection