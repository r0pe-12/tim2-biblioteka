<!DOCTYPE html {{ $attributes }}>
<html lang="en">

    <head>
        <!-- Meta -->
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta http-equiv="content-language" content="en"/>
        <meta name="description" content="ICT Cortex Library - project for high school students..."/>
        <meta name="keywords" content="ict cortex, cortex, bild, bildstudio, highschool, students, coding"/>
        <meta name="author" content="bildstudio"/>
        <!-- End Meta -->

        <!-- Title -->
        <title>@yield('title') | Library - ICT Cortex student project</title>
        <link rel="shortcut icon" href="{{ asset('img/library-favicon.ico') }}" type="image/vnd.microsoft.icon"/>
        <!-- End Title -->

        <!-- Styles -->
        @include('includes/layout/styles')
        <!-- End Styles -->
    </head>

    <body class="small:bg-gradient-to-r small:from-green-400 small:to-blue-500">
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
        <!-- End Scripts -->
    </body>

</html>
