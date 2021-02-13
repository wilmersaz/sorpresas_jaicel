@extends('layouts.app')
@section('titulo')Usuarios @endsection
@section('content')
<style type="text/css">
    .margin-top{
        width: 288px;
        margin: 0px auto;
        padding-top:6px;
    }

</style>
<div class="card" style="padding: 30px;">
    <div class="card-body">

        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Actualiza tu perfil, {{Auth::user()->name }}
                    </h3>
                </div>
            </div>
            
            <!--begin::Form-->
            <form id="formActualizarPefil" class="kt-form" data-toggle="validator" role ="form" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="id_perfil" value="{{Auth::user()->id }}">
                <div class="kt-portlet__body">
                    <div class="kt-section kt-section--first">
                        <h3 class="kt-section__title">1. Información del usuario:</h3>
                        <div class="kt-section__body">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Nombre Completo:</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="name_act" id="name_act" placeholder="Nombre Completo" value="{{Auth::user()->name }}" required>
                                    <span class="form-text text-muted">Por favor ingrese su nombre completo</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Cargo:</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="cargo_act" id="cargo_act" placeholder="Cargo" value="{{Auth::user()->cargo }}" required>
                                    <span class="form-text text-muted">Por favor ingrese su Cargo</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Empresa:</label>
                                <div class="col-lg-6">
                                    {!!Form::select('empresa_act', $empresas, $user->empresa_id,['class'=> 'form-control m-select2', 'style' => 'width:100%!important;', 'required' => 'true', 'id'=>'empresa_act']) !!}
                                    <span class="form-text text-muted">Por favor ingrese su empresa</span>
                                </div>
                            </div>
                        </div>
                        <h3 class="kt-section__title">2. Información de la cuenta:</h3>
                        <div class="kt-section__body">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Nombre  Usuario:</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" placeholder="Username" value="{{Auth::user()->username }}" readonly disabled style="background-color: #f6f6f6">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Correo Electrónico:</label>
                                <div class="col-lg-6">
                                    <input type="email" class="form-control" name="email_act" id="email_act" placeholder="Enter email" value="{{Auth::user()->email }}" required>
                                    <span class="form-text text-muted">Por favor ingrese su correo electrónico</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Contraseña:</label>
                                <div class="col-lg-6">
                                    <input type="password" autocomplete="offf" id="password" name="password" class="form-control m-input m-login__form-input--last" placeholder="Confirme Contraseña" required>
                                    <span class="form-text text-muted">Para continuar, confirme o actualice su contraseña</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <div class="row">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                                <button type="reset" class="btn btn-secondary">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{ asset('js/users/gestion.js') }}"></script>
@endsection