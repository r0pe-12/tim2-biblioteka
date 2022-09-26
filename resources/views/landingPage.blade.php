<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta http-equiv="content-language" content="en"/>
    <meta name="description" content="ICT Cortex Library - project for high school students..."/>
    <meta name="keywords" content="ict cortex, cortex, bild, bildstudio, highschool, students, coding"/>
    <meta name="author" content="bildstudio"/>
    <!-- End Meta -->

    <!-- Title -->
    <title> InTheLoop | Library - ICT Cortex student project</title>
    <link rel="shortcut icon" href="{{ asset('img/landing/intheloop-icon.svg') }}" type="image/vnd.microsoft.icon"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/landing/nicepage.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('css/landing/Home-1.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('css/landing/custom.css') }}">
    <script class="u-script" type="text/javascript" src="{{ asset('js/landing/jquery-1.9.1.min.js') }}" defer=""></script>
    <script class="u-script" type="text/javascript" src="{{ asset('js/landing/nicepage.js') }}" defer=""></script>
    <script class="u-script" type="text/javascript" src="{{ asset('js/landing/custom.js') }}" defer=""></script>

    <link id="u-theme-google-font" rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">

    <script type="application/ld+json">
		{
			"@context": "https://schema.org",
			"@type": "Organization",
			"name": "",
			"logo": "{{asset('img/landing/default-logo')}}"
		}
    </script>

    <meta name="theme-color" content="#2799b1">
    <meta property="og:title" content="Home 1">
    <meta property="og:type" content="website">
</head>

<body data-home-page="https://website2951745.nicepage.io/Home-1.html?version=ec2f40f5-b347-4b11-ad93-42a4c55062ac"
      data-home-page-title="Home 1" class="u-body u-xl-mode" data-lang="en">
{{--<a href="#" id="scroll" style="display: none;"><span></span></a>--}}
<a href="javascript:void(0);" id="rocketmeluncur" class="showrocket" ><i></i></a>
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
                                <a class="inline u-active-grey-5 u-button-style u-hover-grey-10 u-nav-link u-text-active-grey-90 u-text-grey-90 u-text-hover-grey-90"
                                   href="{{ route('dashboard.index') }}" style="padding: 10px 20px;">Dashboard</a>
                            @else

                            @endif

                            <a class="inline u-active-grey-5 u-button-style u-hover-grey-10 u-nav-link u-text-active-grey-90 u-text-grey-90 u-text-hover-grey-90"
                               href="{{ route('logout') }}" style="padding: 10px 20px;"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                            >Logout</a>

                            <form class="mb-0" id="logout-form" action="{{ route('logout') }}"
                                  method="POST" hidden="">
                                @csrf
                            </form>

                        @else
                            <a class="inline u-active-grey-5 u-button-style u-hover-grey-10 u-nav-link u-text-active-grey-90 u-text-grey-90 u-text-hover-grey-90"
                               href="{{ route('login') }}" style="padding: 10px 20px;">Login</a>
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
                                        <a class="u-button-style u-nav-link" href="{{ route('dashboard.index') }}" style="padding: 10px 20px;">Dashboard</a>
                                    </li>
                                @else

                                @endif

                                <li class="u-nav-item">
                                    <a class="u-button-style u-nav-link" href="{{ route('logout') }}" style="padding: 10px 20px;"
                                       onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                    >Logout</a>
                                </li>

                                <form class="mb-0" id="logout-form" action="{{ route('logout') }}"
                                      method="POST" hidden="">
                                    @csrf
                                </form>

                            @else
                                <li class="u-nav-item">
                                    <a class="u-button-style u-nav-link" href="{{ route('login') }}" style="padding: 10px 20px;">Login</a>
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
<section style="z-index: 1;"
         class="u-align-center u-clearfix u-image u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-section-1"
         id="sec-6c81" data-image-width="1980" data-image-height="1114">
    <div class="u-clearfix u-gutter-0 u-layout-wrap u-layout-wrap-1">
        <div class="u-layout" style="">
            <div class="u-layout-row" style="">
                <div
                    class="u-align-left u-container-style u-layout-cell u-left-cell u-shape-rectangle u-size-20-lg u-size-20-xl u-size-23-md u-size-23-sm u-size-23-xs u-size-xs-60 u-layout-cell-1"
                    >
                    <div class="u-container-layout u-valign-middle u-container-layout-1">
                        <h1 class="u-text u-text-body-alt-color u-text-1" data-animation-name="fadeIn"
                            data-animation-duration="1000" data-animation-direction="Left"
                            data-animation-delay="250"> Library Education</h1>
                        <p class="u-text u-text-body-alt-color u-text-2" data-animation-name="fadeIn"
                           data-animation-duration="1000" data-animation-direction="Up"
                           data-animation-delay="250">Duis aute irure dolor in reprehenderit in
                            voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                            sint occaecat cupidatat non proident</p>
                        <a href="https://nicepage.com/k/arabic-style-html-templates"
                           class="u-border-none u-btn u-btn-round u-button-style u-palette-3-base u-radius-10 u-text-palette-1-base u-btn-1"
                           data-animation-name="fadeIn" data-animation-duration="1000"
                           data-animation-direction="Up" data-animation-delay="500">learn more</a>
                        <p class="u-text u-text-body-alt-color u-text-3" data-animation-name="fadeIn"
                           data-animation-duration="1000" data-animation-direction="Up"
                           data-animation-delay="500">Images from <a
                                href="https://www.freepik.com/psd/abstract-background"
                                class="u-active-none u-border-2 u-border-active-palette-3-base u-border-hover-palette-3-base u-border-white u-btn u-button-link u-button-style u-hover-none u-none u-text-body-alt-color u-btn-2">Freepik</a>
                        </p>
                    </div>
                </div>
                <div
                    class="u-align-center u-container-style u-image u-layout-cell u-right-cell u-size-37-md u-size-37-sm u-size-37-xs u-size-40-lg u-size-40-xl u-size-xs-60 u-image-1"
                    data-image-width="1422" data-image-height="900">
                    <div class="u-container-layout u-container-layout-2"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="u-align-center u-clearfix u-valign-middle u-white u-section-2" id="carousel_2f1f">
    <div class="u-expanded-width u-gradient u-opacity u-opacity-55 u-shape u-shape-rectangle u-shape-1"
         data-animation-name="rollIn" data-animation-duration="1000" data-animation-direction=""></div>
    <div class="u-clearfix u-gutter-40 u-layout-spacing-vertical u-layout-wrap u-layout-wrap-1">
        <div class="u-gutter-0 u-layout">
            <div class="u-layout-row">
                <div class="u-size-31 u-size-60-md">
                    <div class="u-layout-col">
                        <div
                            class="u-container-style u-hidden-md u-hidden-sm u-hidden-xs u-layout-cell u-right-cell u-size-20 u-layout-cell-1"
                            wfd-invisible="true">
                            <div class="u-container-layout u-container-layout-1"></div>
                        </div>
                        <div
                            class="u-align-center u-container-style u-layout-cell u-radius-20 u-right-cell u-shape-round u-size-40 u-white u-layout-cell-2"
                            data-animation-name="fadeIn" data-animation-duration="1000"
                            data-animation-direction="Left" data-animation-delay="250">
                            <div class="u-container-layout u-valign-top u-container-layout-2">
                                <img class="u-expanded-width u-image u-image-round u-radius-20 u-image-1"
                                     src="{{asset('img/landing/bn.jpg')}}" alt="" data-image-width="800"
                                     data-image-height="800" data-animation-name="fadeIn"
                                     data-animation-duration="2000"
                                     data-animation-direction="Left" data-animation-delay="250">
                                <h5 class="u-text u-text-1"> Experience what you have learned</h5>
                                <p class="u-text u-text-2"> We treat each child as a unique
                                    individual and aim to instil in them a sense of curiosity
                                    and a love of learning that will continue throughout their
                                    lives.</p>
                                <a href="https://nicepage.com/k/arabic-style-html-templates"
                                   class="u-border-none u-btn u-btn-round u-button-style u-palette-3-base u-radius-10 u-text-palette-1-base u-btn-1"
                                   data-animation-name="rollIn" data-animation-duration="1000"
                                   data-animation-direction="" data-animation-delay="500">learn
                                    more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="u-size-29 u-size-60-md">
                    <div class="u-layout-col">
                        <div
                            class="u-align-center u-container-style u-layout-cell u-left-cell u-radius-20 u-size-40 u-layout-cell-3"
                            data-animation-name="zoomIn" data-animation-duration="2000"
                            data-animation-direction="">
                            <div
                                class="u-container-layout u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-valign-top-lg u-valign-top-xl u-container-layout-3"
                                >
                                <img class="u-image u-image-round u-radius-20 u-image-2"
                                     src="{{asset('img/landing/kj.jpg')}}" data-image-width="1200"
                                     data-image-height="1002" data-animation-name="fadeIn"
                                     data-animation-duration="1000"
                                     data-animation-direction="Right" data-animation-delay="250" alt="">
                            </div>
                        </div>
                        <div
                            class="u-align-center u-container-style u-layout-cell u-left-cell u-size-20 u-white u-layout-cell-4">
                            <div class="u-container-layout u-valign-top u-container-layout-4">
                                <h3 class="u-text u-text-default u-text-3"> School librarians hear
                                    the question all the time</h3>
                                <p class="u-text u-text-4">Egestas dui id ornare arcu odio. In
                                    tellus integer feugiat scelerisque varius morbi enim nunc.
                                    Habitasse platea dictumst quisque sagittis. Interdum velit
                                    euismod in pellentesque massa placerat duis. Quis viverra
                                    nibh cras pulvinar mattis.<br>
                                </p>
                                <p class="u-text u-text-default u-text-5">Images from <a
                                        href="https://www.freepik.com/psd/woman"
                                        class="u-border-1 u-border-active-palette-1-base u-border-black u-border-hover-palette-1-base u-btn u-button-link u-button-style u-none u-text-body-color u-btn-2">Freepik</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="u-align-center u-clearfix u-palette-3-base u-section-3" id="carousel_aed0">
    <div class="u-gradient u-opacity u-opacity-55 u-shape u-shape-rectangle u-shape-1"
         data-animation-name="fadeIn" data-animation-duration="1000" data-animation-direction="Left"></div>
    <div class="u-list u-list-1">
        <div class="u-repeater u-repeater-1">
            <div class="u-container-style u-list-item u-radius-20 u-repeater-item u-shape-round u-white u-list-item-1"
                 data-animation-name="flipIn" data-animation-duration="1000" data-animation-direction="X"
                 data-animation-delay="250">
                <div class="u-container-layout u-similar-container u-valign-top u-container-layout-1">
                    <h3 class="u-text u-text-default u-text-palette-1-base u-text-1">01</h3>
                    <p class="u-text u-text-2">Duis aute irure dolor in reprehenderit in voluptate velit
                        esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </div>
            </div>
            <div class="u-container-style u-list-item u-radius-20 u-repeater-item u-shape-round u-white"
                 data-animation-name="flipIn" data-animation-duration="1000" data-animation-direction="X"
                 data-animation-delay="250">
                <div class="u-container-layout u-similar-container u-valign-top u-container-layout-2">
                    <h3 class="u-text u-text-default u-text-palette-1-base u-text-3">02</h3>
                    <p class="u-text u-text-4">Duis aute irure dolor in reprehenderit in voluptate velit
                        esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </div>
            </div>
            <div class="u-container-style u-list-item u-radius-20 u-repeater-item u-shape-round u-white"
                 data-animation-name="flipIn" data-animation-duration="1000" data-animation-direction="X"
                 data-animation-delay="250">
                <div class="u-container-layout u-similar-container u-valign-top u-container-layout-3">
                    <h3 class="u-text u-text-default u-text-palette-1-base u-text-5">03</h3>
                    <p class="u-text u-text-6">Duis aute irure dolor in reprehenderit in voluptate velit
                        esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="u-gradient u-shape u-shape-circle u-shape-2" data-animation-name="customAnimation"
         data-animation-duration="1000" data-animation-direction="" data-animation-delay="250"></div>
</section>
<section class="u-clearfix u-section-4" id="carousel_08cf">
    <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <div
            class="u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-gradient u-shape u-shape-rectangle u-shape-1">
        </div>
        <img class="u-align-left u-image u-image-round u-radius-20 u-image-1" data-image-width="900"
             data-image-height="900" src="{{ asset('img/landing/5178414.jpg') }}" alt="">
        <div class="u-container-style u-grey-5 u-group u-radius-20 u-shape-round u-group-1">
            <div
                class="u-container-layout u-valign-middle-lg u-valign-middle-md u-valign-middle-sm u-valign-middle-xl u-container-layout-1">
                <h3 class="u-align-left u-text u-text-default u-text-1"> Good things don’t come easy</h3>
                <p class="u-align-left u-text u-text-2"> Duis aute irure dolor in reprehenderit in
                    voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                    cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                    laborum. </p>
                <p class="u-align-left u-text u-text-default u-text-3">Images from <a
                        href="https://www.freepik.com/psd/woman"
                        class="u-border-1 u-border-active-palette-1-base u-border-black u-border-hover-palette-1-base u-btn u-button-link u-button-style u-none u-text-body-color u-btn-1">Freepik</a>
                </p>
                <a href="https://nicepage.com/k/arabic-style-html-templates"
                   class="u-border-none u-btn u-btn-round u-button-style u-palette-3-base u-radius-10 u-text-palette-1-base u-btn-2">learn
                    more</a>
            </div>
        </div>
        <div class="u-gradient u-shape u-shape-circle u-shape-2"></div>
    </div>
</section>
<section class="u-align-center u-clearfix u-grey-5 u-section-5" id="sec-686e">
    <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <h2 class="u-text u-text-default u-text-1"> Meet our Principal</h2>
        <div class="u-list u-list-1">
            <div class="u-repeater u-repeater-1">
                <div
                    class="u-align-left u-container-style u-custom-item u-gradient u-list-item u-radius-20 u-repeater-item u-shape-round u-list-item-1">
                    <div class="u-container-layout u-similar-container u-container-layout-1">
                        <h4
                            class="u-custom-item u-text u-text-body-alt-color u-text-default u-text-2">
                            Learning is an active process</h4>
                        <p class="u-custom-item u-text u-text-body-alt-color u-text-default u-text-3">
                            Sample text. Click to select the text box. Click again or double click
                            to start editing the text.&nbsp;Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
                </div>
                <div
                    class="u-align-left u-container-style u-custom-item u-list-item u-radius-20 u-repeater-item u-shape-round u-video-cover u-white u-list-item-2">
                    <div class="u-container-layout u-similar-container u-container-layout-2">
                        <h4 class="u-custom-item u-text u-text-default u-text-4"> Help students set
                            challenging goals</h4>
                        <p class="u-custom-item u-text u-text-default u-text-5">Sample text. Click to
                            select the text box. Click again or double click to start editing the
                            text.&nbsp;Excepteur sint occaecat cupidatat non proident, sunt in culpa
                            qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>
                <div
                    class="u-align-left u-container-style u-custom-item u-list-item u-radius-20 u-repeater-item u-shape-round u-video-cover u-white u-list-item-3">
                    <div class="u-container-layout u-similar-container u-container-layout-3">
                        <h4 class="u-custom-item u-text u-text-default u-text-6"> Give students
                            positive reinforcement</h4>
                        <p class="u-custom-item u-text u-text-default u-text-7">Sample text. Click to
                            select the text box. Click again or double click to start editing the
                            text.&nbsp;Excepteur sint occaecat cupidatat non proident, sunt in culpa
                            qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>
                <div
                    class="u-align-left u-container-style u-custom-item u-gradient u-list-item u-radius-20 u-repeater-item u-shape-round u-video-cover u-list-item-4">
                    <div class="u-container-layout u-similar-container u-container-layout-4">
                        <h4
                            class="u-custom-item u-text u-text-body-alt-color u-text-default u-text-8">
                            Work individually with students</h4>
                        <p class="u-custom-item u-text u-text-body-alt-color u-text-default u-text-9">
                            Sample text. Click to select the text box. Click again or double click
                            to start editing the text.&nbsp;Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="u-clearfix u-section-7" id="carousel_33aa">
    <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <div
            class="u-clearfix u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-layout-wrap u-layout-wrap-1">
            <div class="u-layout">
                <div class="u-layout-row">
                    <div
                        class="u-align-left u-container-style u-layout-cell u-left-cell u-size-15 u-size-60-md u-layout-cell-1">
                        <div class="u-container-layout u-valign-top u-container-layout-1">
                            <h4 class="u-text u-text-1"> Online learning</h4>
                            <p class="u-text u-text-2">Sample text. Lorem ipsum dolor sit amet,
                                consectetur adipiscing elit nullam nunc justo sagittis suscipit
                                ultrices.</p>
                            <a href="https://nicepage.com/k/arabic-style-html-templates"
                               class="u-border-none u-btn u-btn-round u-button-style u-palette-3-base u-radius-10 u-text-palette-1-base u-btn-1"
                               data-animation-name="rollIn" data-animation-duration="1000"
                               data-animation-direction="" data-animation-delay="500">learn
                                more</a>
                            <p class="u-text u-text-default u-text-3">Image from <a
                                    href="https://www.freepik.com/psd/woman"
                                    class="u-border-1 u-border-active-palette-1-base u-border-black u-border-hover-palette-1-base u-btn u-button-link u-button-style u-none u-text-body-color u-btn-2">Freepik</a>
                            </p>
                        </div>
                    </div>
                    <div
                        class="u-align-left u-container-style u-layout-cell u-size-18-lg u-size-18-xl u-size-21-sm u-size-21-xs u-size-60-md u-layout-cell-2">
                        <div class="u-container-layout u-valign-bottom u-container-layout-2"><span
                                class="u-icon u-text-palette-3-base u-icon-1"><svg
                                    class="u-svg-link" preserveAspectRatio="xMidYMin slice"
                                    viewBox="0 0 95.333 95.332" style="">
										<use xlink:href="#svg-cbee"></use>
									</svg><svg class="u-svg-content" viewBox="0 0 95.333 95.332"
                                               x="0px" y="0px" id="svg-cbee" style="">
										<g>
											<g>
												<path
                                                    d="M30.512,43.939c-2.348-0.676-4.696-1.019-6.98-1.019c-3.527,0-6.47,0.806-8.752,1.793    c2.2-8.054,7.485-21.951,18.013-23.516c0.975-0.145,1.774-0.85,2.04-1.799l2.301-8.23c0.194-0.696,0.079-1.441-0.318-2.045    s-1.035-1.007-1.75-1.105c-0.777-0.106-1.569-0.16-2.354-0.16c-12.637,0-25.152,13.19-30.433,32.076    c-3.1,11.08-4.009,27.738,3.627,38.223c4.273,5.867,10.507,9,18.529,9.313c0.033,0.001,0.065,0.002,0.098,0.002    c9.898,0,18.675-6.666,21.345-16.209c1.595-5.705,0.874-11.688-2.032-16.851C40.971,49.307,36.236,45.586,30.512,43.939z">
												</path>
												<path
                                                    d="M92.471,54.413c-2.875-5.106-7.61-8.827-13.334-10.474c-2.348-0.676-4.696-1.019-6.979-1.019    c-3.527,0-6.471,0.806-8.753,1.793c2.2-8.054,7.485-21.951,18.014-23.516c0.975-0.145,1.773-0.85,2.04-1.799l2.301-8.23    c0.194-0.696,0.079-1.441-0.318-2.045c-0.396-0.604-1.034-1.007-1.75-1.105c-0.776-0.106-1.568-0.16-2.354-0.16    c-12.637,0-25.152,13.19-30.434,32.076c-3.099,11.08-4.008,27.738,3.629,38.225c4.272,5.866,10.507,9,18.528,9.312    c0.033,0.001,0.065,0.002,0.099,0.002c9.897,0,18.675-6.666,21.345-16.209C96.098,65.559,95.376,59.575,92.471,54.413z">
												</path>
											</g>
										</g>
									</svg></span>
                            <p class="u-text u-text-4">Luctus accumsan tortor posuere ac ut
                                consequat. Bibendum ut tristique et egestas quis ipsum suspendisse
                                ultrices. Gravida in fermentum et sollicitudin ac orci. Purus
                                gravida quis blandit turpis. Interdum consectetur libero id
                                faucibus nisl tincidunt eget nullam non.<span
                                    style="font-style: italic;"></span>
                            </p>
                        </div>
                    </div>
                    <div
                        class="u-align-center-sm u-align-center-xs u-container-style u-layout-cell u-right-cell u-size-24-sm u-size-24-xs u-size-27-lg u-size-27-xl u-size-60-md u-layout-cell-3">
                        <div class="u-container-layout u-valign-middle-md u-container-layout-3">
                            <div
                                class="u-expanded-width u-gradient u-shape u-shape-rectangle u-shape-1">
                            </div>
                            <img src="{{asset('img/landing/ggg.jpg')}}" alt=""
                                 class="u-align-left u-image u-image-default u-image-1"
                                 data-image-width="900" data-image-height="946">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="u-align-center u-clearfix u-grey-5 u-section-8" id="carousel_6405">
    <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <div class="u-clearfix u-expanded-width u-gutter-20 u-layout-wrap u-layout-wrap-1">
            <div class="u-layout">
                <div class="u-layout-row">
                    <div
                        class="u-align-center u-container-style u-layout-cell u-size-38 u-layout-cell-1">
                        <div
                            class="u-container-layout u-valign-middle-lg u-valign-middle-md u-valign-middle-xl u-container-layout-1">
                            <div class="u-form u-form-1">
                                <form action="#"
                                      class="u-clearfix u-form-spacing-15 u-form-vertical u-inner-form"
                                      style="padding: 0;" name="form">
                                    <div
                                        class="u-form-email u-form-group u-form-partition-factor-2">
                                        <label for="email-f2a8"
                                               class="u-label u-label-1">E-mail</label>
                                        <input type="email"
                                               placeholder="Enter a valid email address"
                                               id="email-f2a8" name="email"
                                               class="u-border-2 u-border-grey-75 u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle"
                                               required="">
                                    </div>
                                    <div
                                        class="u-form-group u-form-name u-form-partition-factor-2">
                                        <label for="name-f2a8"
                                               class="u-label u-label-2">Name</label>
                                        <input type="text" placeholder="Enter your Name"
                                               id="name-f2a8" name="name"
                                               class="u-border-2 u-border-grey-75 u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle"
                                               required="">
                                    </div>
                                    <div class="u-form-group u-form-select u-form-group-3">
                                        <label for="select-8e9d"
                                               class="u-form-control-hidden u-label u-label-3">Select</label>
                                        <div class="u-form-select-wrapper">
                                            <select id="select-8e9d" name="select"
                                                    class="u-border-2 u-border-grey-75 u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle">
                                                <option value="Item 1">Item 1</option>
                                                <option value="Item 2">Item 2</option>
                                                <option value="Item 3">Item 3</option>
                                            </select>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 width="14" height="12"
                                                 class="u-caret">
                                                <path fill="currentColor" d="M4 8L0 4h8z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div
                                        class="u-form-date u-form-group u-form-partition-factor-2 u-form-group-4">
                                        <label for="date-4441"
                                               class="u-label u-label-4">Date</label>
                                        <input type="date" placeholder="MM/DD/YYYY"
                                               id="date-4441" name="date"
                                               class="u-border-2 u-border-grey-75 u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle"
                                               required="">
                                    </div>
                                    <div
                                        class="u-form-group u-form-partition-factor-2 u-form-phone u-form-group-5">
                                        <label for="phone-447e"
                                               class="u-label u-label-5">Phone</label>
                                        <input type="tel"
                                               pattern="\+?\d{0,2}[\s\(\-]?([0-9]{3})[\s\)\-]?([\s\-]?)([0-9]{3})[\s\-]?([0-9]{2})[\s\-]?([0-9]{2})"
                                               placeholder="Enter your phone (e.g. +14155552675)"
                                               id="phone-447e" name="phone"
                                               class="u-border-2 u-border-grey-75 u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle"
                                               required="">
                                    </div>
                                    <div class="u-form-group u-form-message u-form-group-6">
                                        <label for="message-f2a8"
                                               class="u-label u-label-6">Message</label>
                                        <textarea placeholder="Enter your message" rows="4"
                                                  cols="50" id="message-f2a8" name="message"
                                                  class="u-border-2 u-border-grey-75 u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle"
                                                  required=""></textarea>
                                    </div>
                                    <div class="u-align-left u-form-group u-form-submit">
                                        <a href="#"
                                           class="u-active-palette-1-base u-border-none u-btn u-btn-rectangle u-btn-submit u-button-style u-hover-palette-1-base u-palette-3-base u-text-active-white u-text-hover-white u-text-palette-1-base u-btn-1">Submit</a>
                                        <input type="submit" value="submit"
                                               class="u-form-control-hidden">
                                    </div>
                                    <div class="u-form-send-message u-form-send-success"> Thank
                                        you! Your message has been sent.
                                    </div>
                                    <div class="u-form-send-error u-form-send-message"> Unable
                                        to send your message. Please fix errors then try
                                        again.
                                    </div>
                                    <input type="hidden" value="" name="recaptchaResponse">
                                    <input type="hidden" name="formServices"
                                           value="2c742e9d3448506df82852de7a2d8e9a">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="u-container-style u-layout-cell u-size-22 u-white u-layout-cell-2">
                        <div class="u-container-layout u-valign-middle u-container-layout-2">
                            <p class="u-text u-text-default u-text-1"> Ut enim ad minim veniam, quis
                                nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate
                                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                                occaecat cupidatat non proident, sunt in culpa qui officia
                                deserunt mollit anim id est laborum.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-90c0">
    <div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">Sample text. Click to select the text box.
            Click again or double click to start editing the text.</p>
    </div>
</footer>
<section class="u-backlink u-clearfix u-grey-80">
    <a class="u-link" href="https://nicepage.com/html-templates" target="_blank">
        <span>HTML Template</span>
    </a>
    <p class="u-text">
        <span>created with</span>
    </p>
    <a class="u-link" href="https://nicepage.com/website-builder" target="_blank">
        <span>Website Builder</span>
    </a>.
</section>

</body>

</html>
