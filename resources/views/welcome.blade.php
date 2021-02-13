@extends('layouts.app')
@section('titulo')Bienvenido @endsection
@section('content')
<body  class="m--skin- m-page--loading-enabled m-page--loading m-content--skin-light m-header--fixed m-header--fixed-mobile m-aside-left--offcanvas-default m-aside-left--enabled m-aside-left--fixed m-aside-left--skin-dark m-aside--offcanvas-default">
    <div class="m-grid m-grid--hor m-grid--root m-page">

        <img src="{{ asset('imagenes/fondo.jpg') }}" style="width:100%">
    </div>
    <div id="m_quick_sidebar" class="m-quick-sidebar m-quick-sidebar--tabbed m-quick-sidebar--skin-light">
        <div class="m-quick-sidebar__content m--hide">
            <span id="m_quick_sidebar_close" class="m-quick-sidebar__close">
                <i class="la la-close"></i>
            </span>
        </div>
    </div>
</body>
@endsection