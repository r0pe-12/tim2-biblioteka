<!DOCTYPE html {{ $attributes }}>
<html lang="en">

    <head>
        <!-- Meta -->
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta http-equiv="content-language" content="en"/>
        <meta name="description" content="InTheLoop - ICT Cortex Library"/>
        <meta name="keywords" content="ict cortex, cortex, datadesign, intheloop, highschool, students, coding"/>
        <meta name="author" content="datadesign"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- End Meta -->

        <!-- Title -->
        <title>@yield('title') | InTheLoop - Library - Admin</title>
        <link rel="shortcut icon" href="{{ asset('img/landing/intheloop-icon.svg') }}" type="image/vnd.microsoft.icon"/>
        <!-- End Title -->

        <!-- Styles -->
        @include('includes/layout/styles')
        @yield('styles')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.9.6/lottie.min.js"></script>
        <!-- End Styles -->
    </head>

    <body class="small:bg-gradient-to-r small:from-green-400 small:to-blue-500">
        <div class="loader-wrapper">
            <div style="width: 300px; height: 300px;" id="lwrapper">
                <script>
                    var animation = bodymovin.loadAnimation({
                        container: document.querySelector('#lwrapper'),
                        renderer: 'svg',
                        loop: true,
                        autoplay: true,
                        path: '{{ asset('bibliotekaLoader.json') }}'
                    })
                    animation.setSpeed(1.5);
                </script>
            </div>
{{--            <div class="book">--}}
{{--                <div class="inner">--}}
{{--                    <div class="left"></div>--}}
{{--                    <div class="middle"></div>--}}
{{--                    <div class="right"></div>--}}
{{--                </div>--}}
{{--                <ul>--}}
{{--                    <li></li>--}}
{{--                    <li></li>--}}
{{--                    <li></li>--}}
{{--                    <li></li>--}}
{{--                    <li></li>--}}
{{--                    <li></li>--}}
{{--                    <li></li>--}}
{{--                    <li></li>--}}
{{--                    <li></li>--}}
{{--                    <li></li>--}}
{{--                    <li></li>--}}
{{--                    <li></li>--}}
{{--                    <li></li>--}}
{{--                    <li></li>--}}
{{--                    <li></li>--}}
{{--                    <li></li>--}}
{{--                    <li></li>--}}
{{--                    <li></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
        </div>
        <!-- Header -->
        @include('includes/layout/header')
        <!-- Header -->

        <!-- Main content -->
        <main class="flex flex-row small:hidden">
            <!-- Sidebar -->
            @include('includes/layout/sidebar')
            <!-- End Sidebar -->
            {{ $slot }}
        </main>
        <!-- End Main content -->

        <!-- Notification for small devices -->
        @include('includes/layout/inProgress')


        <!-- Scripts -->
        @include('includes/layout/scripts')
        @yield('scripts')
        <script>
            $(window).on("load", function () {
                console.log(window.location.pathname);
                if (window.location.pathname != '/activity') {
                    $(':checkbox .checkOthers').each(function () {
                        this.checked = false;
                    });
                }
                $(".loader-wrapper").fadeOut("slow");
            })
        </script>
        <!-- End Scripts -->
    </body>

</html>
