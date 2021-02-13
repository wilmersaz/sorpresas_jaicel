@extends('layouts.auth')
@section('titulo')Recuperar Contraseña @endsection
@section('content')
    <!--begin::Content-->
    <div class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">
        <!--begin::Head-->
        <div class="kt-login__head">
        </div>
        <!--end::Head-->
        <!--begin::Body-->
        <div class="kt-login__body">
            <!--begin::Signin-->
            <div class="kt-login__form">
              <div class="kt-grid__item" style="justify-content: center; text-align: center;" >

                <a href="{{ url('/password/reset') }}" class="kt-login__logo">
                    <img src="{!! asset('image/users/password.png') !!}" style="width:150px; height: 150px;" >
                </a>
                </div>
                <br>
                <br>
                <div class="kt-login__title">
                    <h3>Recuperar Contraseña</h3>
                    <h6>Ingrese su dirección de correo electrónico a continuación para restablecer su contraseña.</h6>
                </div>
                <!--begin::Form-->
                <form class="kt-form" action="{{ route('password.email') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input class="form-control" type="text" autocomplete="off" placeholder="Email" name="email">
                    </div>
                    <!--begin::Action-->
                    <div class="kt-login__actions">
                        <a href="{{route('login')}}"  class="btn btn-secondary">Regresar</a>
                        <button id="m_login_forget_password_submit" class="btn btn-primary uppercase">Recuperar Contraseña</button>
                    </div>
                    <!--end::Action-->
                </form>

                <!--end::Form-->
                <!--end::Options-->
            </div>

            <!--end::Signin-->
        </div>

        <!--end::Body-->
    </div>
    <!--end::Content-->
@endsection