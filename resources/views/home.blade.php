@extends('layouts.app')
@section('titulo')Bienvenido @endsection
@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    <div class="kt-portlet">
        <div class="kt-portlet__body  kt-portlet__body--fit">
            <div class="row row-no-padding row-col-separator-xl">
                <div class="col-md-12 col-lg-12 col-xl-12">
                    <img src="{{ asset('imagenes/fondo.jpg') }}" style="width: 100%">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
            </div>
            <div class="tab-pane" id="kt_widget11_tab3_content">
            </div>
        </div>
    </div>
</div>
@endsection
