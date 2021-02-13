@extends('layouts.app')
@section('titulo')Error 403 @endsection
@section('content')
    <div class="card" style="padding: 30px;">
        <div class="card-body">
            <div class="m-grid m-grid--hor m-grid--root m-page">
                <div class="m-grid__item m-grid__item--fluid m-grid  m-error-1">
                    <div class="m-error_container">
                        <span class="m-error_number">
                            <h1>403</h1>
                        </span>
                        <p class="m-error_desc">
                            OOPS! Usted no tiene permisos para acceder a este archivo
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection