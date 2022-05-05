<header class="u-clearfix u-custom-color-2 u-header u-sticky u-header" id="sec-dabd">
    <div class="u-clearfix u-sheet u-sheet-1">
        <h3 class="u-custom-font u-headline u-text u-text-custom-color-6 u-text-1">
            <a href="/">HRS Cooperative</a>
        </h3>
        <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1" data-position="Login">
            <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
                <a class="u-button-style u-custom-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base"
                    href="#">
                    <svg>
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use>
                    </svg>
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <defs>
                            <symbol id="menu-hamburger" viewBox="0 0 16 16" style="width: 16px; height: 16px;">
                                <rect y="1" width="16" height="2"></rect>
                                <rect y="7" width="16" height="2"></rect>
                                <rect y="13" width="16" height="2"></rect>
                            </symbol>
                        </defs>
                    </svg>
                </a>
            </div>

            <div class="u-custom-menu u-nav-container">
                <ul class="u-nav u-unstyled u-nav-1">
                    <li class="u-nav-item"><a
                            class="u-button-style u-nav-link u-text-active-custom-color-5 u-text-custom-color-4 u-text-hover-custom-color-3"
                            href="{{ route('index') }}" style="padding: 10px 20px;">Home</a></li>
                    {{-- @if (auth::user())
                    <p>auth user line</p>
                @endif --}}

                    @guest
                        <li class="u-nav-item"><a
                                class="u-button-style u-nav-link u-text-active-custom-color-5 u-text-custom-color-4 u-text-hover-custom-color-3"
                                href="{{ route('auth.login') }}" style="padding: 10px 20px;">Login</a></li>
                        <li class="u-nav-item"><a
                                class="u-button-style u-nav-link u-text-active-custom-color-5 u-text-custom-color-4 u-text-hover-custom-color-3"
                                href="{{ route('auth.register') }}" style="padding: 10px 20px;">SignUp</a></li>
                    @endguest
                    @auth
                        <li class="u-nav-item">
                            <form method="post" action="{{ route('auth.logout') }}">
                                @csrf
                                <a class="u-button-style u-nav-link u-text-active-custom-color-5 u-text-custom-color-4 u-text-hover-custom-color-3"
                                    style="padding: 10px 20px;" :href="route('auth.logout')" href=""
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}</a>
                            </form>
                        </li>
                    @endauth

                    <li class="u-nav-item"><a
                            class="u-button-style u-nav-link u-text-active-custom-color-5 u-text-custom-color-4 u-text-hover-custom-color-3"
                            href="{{ route('about') }}" style="padding: 10px 20px;">About</a></li>
                    <li class="u-nav-item"><a
                            class="u-button-style u-nav-link u-text-active-custom-color-5 u-text-custom-color-4 u-text-hover-custom-color-3"
                            href="{{ route('contact') }}" style="padding: 10px 20px;">Contact</a></li>
                </ul>
            </div>
            <div class="u-custom-menu u-nav-container-collapse">
                <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                    <div class="u-sidenav-overflow">
                        <div class="u-menu-close"></div>
                        <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
                            <li class="u-nav-item"><a class="u-button-style u-nav-link"
                                    href="{{ route('index') }}" style="padding: 10px 20px;">Home</a></li>
                            <li class="u-nav-item"><a class="u-button-style u-nav-link"
                                    href="{{ route('auth.login') }}" style="padding: 10px 20px;">Login</a></li>
                            <li class="u-nav-item"><a class="u-button-style u-nav-link"
                                    href="{{ route('auth.register') }}" style="padding: 10px 20px;">SignUp</a></li>

                            @guest
                                <li class="u-nav-item"><a class="u-button-style u-nav-link"
                                        href="{{ route('auth.login') }}" style="padding: 10px 20px;">Login</a></li>
                                <li class="u-nav-item"><a class="u-button-style u-nav-link"
                                        href="{{ route('auth.register') }}" style="padding: 10px 20px;">SignUp</a></li>
                            @endguest
                            @auth
                                <li class="u-nav-item">
                                    <form method="post" action="{{ route('auth.logout') }}">
                                        @csrf
                                        <a class="u-button-style u-nav-link" style="padding: 10px 20px;"
                                            :href="route('auth.logout')" href=""
                                            onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{ __('Log Out') }}</a>
                                    </form>
                                </li>
                            @endauth
                            <li class="u-nav-item"><a class="u-button-style u-nav-link"
                                    href="{{ route('about') }}" style="padding: 10px 20px;">About</a></li>
                            <li class="u-nav-item"><a class="u-button-style u-nav-link"
                                    href="{{ route('contact') }}" style="padding: 10px 20px;">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
            </div>
        </nav>
    </div>
</header>
