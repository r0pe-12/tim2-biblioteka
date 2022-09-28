<header class="u-clearfix u-header u-header sticky-header" id="sec-9c34">
    <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <a href="/" class="u-image u-logo u-image-1">
            <img src="{{asset('img/landing/intheloop-full')}}.svg" class="u-logo-image u-logo-image-1" alt="logo">
        </a>
        <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1" data-responsive-from="SM">
            <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0; font-weight: 500;">
                <a class="u-button-style u-custom-active-color u-custom-border u-custom-border-color u-custom-hover-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base"
                   href="#">
                    <svg class="u-svg-link" viewBox="0 0 24 24">
                        <use xlink:href="#menu-hamburger"></use>
                    </svg>
                    <svg class="u-svg-content" id="menu-hamburger" viewBox="0 0 16 16"
                         x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink"
                         xmlns="http://www.w3.org/2000/svg">
                        <g>
                            <rect y="1" width="16" height="2"></rect>
                            <rect y="7" width="16" height="2"></rect>
                            <rect y="13" width="16" height="2"></rect>
                        </g>
                    </svg>
                </a>
            </div>
            <div class="u-custom-menu u-nav-container">
                <ul class="u-nav u-spacing-2 u-unstyled u-nav-1">
                    <li class="u-nav-item">
                        @if(auth()->check())
                            @if(auth()->user()->isAdmin() || auth()->user()->isLibrarian())

                                <a style="margin: 0 20px;" href="{{ route('dashboard.index') }}" class="link">
                                    <button class="btn btn-outline-primary">
                                        Dashboard
                                    </button>
                                </a>

                            @else

                                <button class="btn btn-outline-primary dropdown-toggle" type="button" style="margin-right: 50px"
                                        id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Knjige
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li>
                                        <a class="u-active-grey-5 u-button-style u-hover-grey-10 u-nav-link u-text-active-grey-90 u-text-grey-90 u-text-hover-grey-90"
                                           href="#rezervisane" style="padding: 10px 20px;"
                                        >Rezervisane</a>
                                    </li>
                                    <li>
                                        <a class="u-active-grey-5 u-button-style u-hover-grey-10 u-nav-link u-text-active-grey-90 u-text-grey-90 u-text-hover-grey-90"
                                           href="#izdate" style="padding: 10px 20px;"
                                        >Izdate</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a class="u-active-grey-5 u-button-style u-hover-grey-10 u-nav-link u-text-active-grey-90 u-text-grey-90 u-text-hover-grey-90"
                                           href="#sveKnjige" style="padding: 10px 20px;"
                                        >Sve Knjige</a>
                                    </li>

                                </ul>

                            @endif

                            <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->name . ' ' . auth()->user()->surname }}
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li>
                                    <a class="u-active-grey-5 u-button-style u-hover-grey-10 u-nav-link u-text-active-grey-90 u-text-grey-90 u-text-hover-grey-90"
                                       href="
                                                           @if(auth()->user()->isLibrarian())
                                                                {{ route('librarians.show', auth()->user()->username) }}
                                                            @elseif(auth()->user()->isAdmin())
                                                                {{ route('admins.show', auth()->user()->username) }}
                                                            @else
                                                                #profil
                                                           @endif
                                                       " style="padding: 10px 20px;"
                                       onclick=""
                                    >Profil</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="u-active-grey-5 u-button-style u-hover-grey-10 u-nav-link u-text-active-grey-90 u-text-grey-90 u-text-hover-grey-90"
                                       href="{{ route('logout') }}" style="padding: 10px 20px;"
                                       onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                    >Logout</a>
                                </li>
                            </ul>

                            <form class="mb-0" id="logout-form" action="{{ route('logout') }}"
                                  method="POST" hidden="">
                                @csrf
                            </form>

                        @else
                            <a href="{{ route('login') }}" class="link">
                                <button class="btn btn-outline-primary">
                                    Login
                                </button>
                            </a>
                        @endif
                    </li>
                </ul>
            </div>
            <div class="u-custom-menu u-nav-container-collapse">
                <div
                        class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                    <div class="u-inner-container-layout u-sidenav-overflow">
                        <div class="u-menu-close" style="cursor: pointer;"></div>
                        <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
                            @if(auth()->check())
                                @if(auth()->user()->isAdmin() || auth()->user()->isLibrarian())
                                    <li class="u-nav-item">
                                        <a class="u-button-style u-nav-link" href="{{ route('dashboard.index') }}"
                                           style="padding: 10px 20px;">Dashboard</a>
                                    </li>
                                @else

                                @endif

                                <li class="u-nav-item">
                                    <a class="u-button-style u-nav-link" href="{{ route('logout') }}"
                                       style="padding: 10px 20px;"
                                       onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                    >Logout</a>
                                </li>

                                <form class="mb-0" id="logout-form" action="{{ route('logout') }}"
                                      method="POST" hidden="">
                                    @csrf
                                </form>

                            @else
                                <li class="u-nav-item">
                                    <a class="u-button-style u-nav-link" href="{{ route('login') }}"
                                       style="padding: 10px 20px;">Login</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
            </div>
        </nav>
    </div>
</header>
