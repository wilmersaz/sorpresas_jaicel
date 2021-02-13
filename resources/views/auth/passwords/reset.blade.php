@extends('layouts.auth')
@section('titulo')Cambiar Contraseña @endsection
@section('content')
    <div class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">
        <!--begin::Head-->
        <div class="kt-login__head">
            <!-- <a href="#" class="kt-link kt-login__signup-link">Activar Cuenta</a> -->
        </div>
        <!--end::Head-->
        <!--begin::Body-->
        <div class="kt-login__body">
            <!--begin::Signin-->
            <div class="kt-login__form">
              <div class="kt-grid__item" style="justify-content: center; text-align: center;" >

                <a href="{{ url('/login') }}" class="kt-login__logo">
                    <img src="{!! asset('image/users/password.png') !!}" style="width:150px; height: 150px;" >
                </a>
                </div>
                <br>
                <br>
                <div class="kt-login__title">
                    <h3>Cambiar Contraseña</h3>
                </div>

                <!--begin::Form-->
                <form class="m-login__form m-form kt-form" method="POST" action="{{ route('password.request') }}">
                    {{ csrf_field() }}
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group m-form__group">
                    <input id="email" type="email" class="form-control m-input m-login__form-input--last" name="email" placeholder="Ingrese email" value="{{ $email or old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group m-form__group">
                    <input id="password" type="password" class="form-control m-input m-login__form-input--last" placeholder="Ingrese Contraseña" name="password" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group m-form__group">
                    <input id="password-confirm" type="password" class="form-control m-input m-login__form-input--last" placeholder="Confirme Contraseña" name="password_confirmation" required>
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
                <br>
                <div class="form-group m-form__group">
                    <div class="m-login__form-action">
                        <button type="submit" class=" btn-primary btn btn-accent m-btn m-btn--pill  m-btn--air  m-login__btn m-login__btn--primary">
                            Cambiar Contraseña
                        </button>
                    </div>
                </div>

                    <!--end::Action-->
                </form>

                <!--end::Form-->
            </div>

            <!--end::Signin-->
        </div>

        <!--end::Body-->
    </div>
    <!--end::Content-->
@endsection
