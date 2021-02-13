        <header id="m_header" class="m-grid__item m-header" m-minimize="minimize" m-minimize-mobile="minimize" m-minimize-offset="200" m-minimize-mobile-offset="200" >
            <div class="m-container m-container--fluid m-container--full-height">
                <div class="m-stack m-stack--ver m-stack--desktop  m-header__wrapper">
                    <div class="m-stack__item m-brand m-brand--mobile">
                        <div class="m-stack m-stack--ver m-stack--general">
                            <div class="m-stack__item m-stack__item--middle m-brand__logo">
                                <a href="{{ route('welcome') }}" class="m-brand__logo-wrapper" title="Inicio" data-toggle="m-tooltip" data-placement="top" title="" data-original-title="Inicio">
                                    <div class="m-demo-icon__preview">
                                        <i class="fa fa-home" style="width: 45px; height: 45px;font-size: 35px;"></i>
                                    </div>
                                </a>
                                @if (Auth::check())
                                <a href="{{ url('/productos/products') }}" class="m-brand__logo-wrapper" title="Productos" data-toggle="m-tooltip" data-placement="top" title="" data-original-title="Productos">
                                    <div class="m-demo-icon__preview">
                                        <i class="fa fa-shopping-basket" style="width: 45px; height: 45px;font-size: 35px;"></i>
                                    </div>
                                </a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" target="_blank" class="m-brand__logo-wrapper" title="Cerrar sesión" data-toggle="m-tooltip" data-placement="top" title="" data-original-title="Cerrar sesión">
                                    <div class="m-demo-icon__preview">
                                        <i class="fa fa-sign-out-alt" style="width: 45px; height: 45px;font-size: 35px;"></i>
                                    </div>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                @else
                                <a href="{{ route('login') }}" class="m-brand__logo-wrapper" title="Iniciar sesión" data-toggle="m-tooltip" data-placement="top" title="" data-original-title="Iniciar sesión">
                                    <div class="m-demo-icon__preview">
                                        <i class="fa fa-user-lock" style="width: 45px; height: 45px;font-size: 35px;"></i>
                                    </div>
                                </a>
                                @endif
                                @if (Auth::check())
                                <a href="{{ url('/categorias/index') }}" class="m-brand__logo-wrapper" title="Categorias" data-toggle="m-tooltip" data-placement="top" title="" data-original-title="Categorias">
                                    <div class="m-demo-icon__preview">
                                        <i class="fab fa-whmcs" style="width: 45px; height: 45px;font-size: 35px;"></i>
                                    </div>
                                </a>
                                @endif
                                <a style="float: right" href="{{ route('contactus') }}" class="m-brand__logo-wrapper" title="Contáctanos" data-toggle="m-tooltip" data-placement="top" title="" data-original-title="Contáctanos">
                                    <div class="m-demo-icon__preview">
                                        <i class="fa fa-info-circle" style="width: 45px; height: 45px;font-size: 35px;"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="m-stack__item m-stack__item--middle m-stack__item--left m-header-head" id="m_header_nav">
                        <div class="m-stack m-stack--ver m-stack--desktop">
                            <div class="m-stack__item m-stack__item--fluid">
                                <button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark " id="m_aside_header_menu_mobile_close_btn">
                                    <i class="la la-close"></i>
                                </button>
                                <div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark "  >
                                    <ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
                                        <li class="m-menu__item  m-menu__item--submenu  m-menu__item--submenu m-menu__item--rel" aria-haspopup="true">
                                            <a  href="{{ route('welcome') }}" class="m-menu__link">
                                                <span class="m-menu__item-here"></span>
                                                <span class="m-menu__link-text">
                                                    Inicio
                                                </span>
                                            </a>
                                        </li>
                                            @if (Auth::check())
                                        <li class="m-menu__item  m-menu__item--submenu  m-menu__item--submenu m-menu__item--rel" aria-haspopup="true">
                                            <a  href="{{ url('/productos/products') }}" class="m-menu__link">
                                                <span class="m-menu__item-here"></span>
                                                <span class="m-menu__link-text">
                                                    Ver Productos
                                                </span>
                                            </a>
                                        </li>
                                            @endif
                                        <li class="m-menu__item  m-menu__item--submenu  m-menu__item--submenu m-menu__item--rel" aria-haspopup="true">
                                            @if (Auth::check())
                                            <a  href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" target="_blank" class="m-menu__link">
                                                <span class="m-menu__item-here"></span>
                                                <span class="m-menu__link-text">
                                                    Cerrar Sesión
                                                </span>
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                            @else
                                            <a  href="{{ route('login') }}" class="m-menu__link">
                                                <span class="m-menu__item-here"></span>
                                                <span class="m-menu__link-text">
                                                    Iniciar Sesión
                                                </span>
                                            </a>
                                            @endif
                                        </li>
                                        @if (Auth::check())
                                        <li class="m-menu__item  m-menu__item--submenu  m-menu__item--submenu m-menu__item--rel" aria-haspopup="true">
                                            <a  href="{{ url('/categorias/index') }}" class="m-menu__link">
                                                <span class="m-menu__item-here"></span>
                                                <span class="m-menu__link-text">
                                                    Categorías
                                                </span>
                                            </a>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-stack__item--right m-stack__item m-stack__item--middle m-stack__item--right m-header-head" id="m_header_nav">
                        <div align="right" class="m-stack m-stack--ver m-stack--desktop">
                            <div class="m-stack__item m-stack__item--fluid">
                                <button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark " id="m_aside_header_menu_mobile_close_btn">
                                    <i class="la la-close"></i>
                                </button>
                                <div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark "  >
                                    <ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
                                        <li class="m-menu__item  m-menu__item--submenu  m-menu__item--submenu m-menu__item--rel" aria-haspopup="true">
                                            <a  href="{{ route('contactus') }}" class="m-menu__link">
                                                <span class="m-menu__item-here"></span>
                                                <span class="m-menu__link-text">
                                                    Contáctanos
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>