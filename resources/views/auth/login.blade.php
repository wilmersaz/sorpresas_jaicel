<!DOCTYPE html>
<html lang="es" >
<head>
	<meta charset="utf-8" />
	<title>Login</title>
	<meta name="description" content="Latest updates and statistic charts">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<link href="{{ asset('css/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="{{ url('imagenes/favicon.ico') }}" />
</head>
<body  class="m--skin- m-content--skin-light m-header--fixed m-header--fixed-mobile m-aside-left--offcanvas-default m-aside-left--enabled m-aside-left--fixed m-aside-left--skin-dark m-aside--offcanvas-default"  >
	<div class="card" style="padding: 30px;">
		
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<div class="m-grid m-grid--hor m-grid--root m-page">
				<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login">
					<div class="m-grid__item m-grid__item--fluid m-login__wrapper">
						<div class="m-login__container">
							<div class="m-login__signin">
								<a href="{{ url('/welcome') }}" type="button" class="btn m-btn--pill m-btn--air btn-secondary m-btn  m-btn--label-metal m-btn--bolder" title="Regresar" data-toggle="m-tooltip" data-placement="top" title="" data-original-title="Regresar">
									<i class="la la-arrow-left"></i>
								</a>
								<div class="m-login__logo">
									<img src="{{ asset('imagenes/user.png') }}" style="max-width: 25%">
								</div>
								<div class="m-login__head">
									<h3 class="m-login__title">
										Iniciar Sesión
									</h3>
								</div>
								<form class="m-login__form m-form" action="{{route('login')}}" method="post" novalidate="novalidate">
									{{ csrf_field() }}
									<div class="form-group m-form__group">
										<input class="form-control m-input" type="text" placeholder="Email" name="mail" autocomplete="off">
									</div>
									<div class="form-group m-form__group">
										<input class="form-control m-input m-login__form-input--last" type="password" placeholder="Password" name="password">
									</div>
									<div class="m-login__form-action">
										<button id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
											Ingresar
										</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="m_quick_sidebar" class="m-quick-sidebar m-quick-sidebar--tabbed m-quick-sidebar--skin-light">
		<div class="m-quick-sidebar__content m--hide">
			<span id="m_quick_sidebar_close" class="m-quick-sidebar__close">
				<i class="la la-close"></i>
			</span>
		</div>
	</div>
	<div id="m_scroll_top" class="m-scroll-top">
		<i class="la la-arrow-up"></i>
	</div>
	<script src="{{ asset('js/vendors.bundle.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/scripts.bundle.js') }}" type="text/javascript"></script>
	<script src="{{ asset('/js/dashboard.js') }}" type="text/javascript"></script>
</body>
</html>
