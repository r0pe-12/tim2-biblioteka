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

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/landing/nicepage.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('css/landing/Home-1.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('css/landing/custom.css') }}">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    <script class="u-script" type="text/javascript" src="{{ asset('js/landing/jquery-1.9.1.min.js') }}" defer=""></script>
    {{--    <script class="u-script" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>--}}
    <script class="u-script" type="text/javascript" src="{{ asset('js/landing/nicepage.js') }}" defer=""></script>
    <script class="u-script" type="text/javascript" src="{{ asset('js/landing/custom.js') }}" defer=""></script>

    <link id="u-theme-google-font" rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">

    {{--    <script type="application/ld+json">--}}
    {{--		{--}}
    {{--			"@context": "https://schema.org",--}}
    {{--			"@type": "Organization",--}}
    {{--			"name": "",--}}
    {{--			"logo": "{{asset('img/landing/default-logo')}}"--}}
    {{--		}--}}
    {{--    </script>--}}

    {{--    <meta name="theme-color" content="#2799b1">--}}
    {{--    <meta property="og:title" content="Home 1">--}}
    {{--    <meta property="og:type" content="website">--}}
</head>
    <body class="u-body u-xl-mode" style="overflow-x: clip" data-lang="en">
        <a href="javascript:void(0);" id="rocketmeluncur" class="showrocket" ><i></i></a>
        <x-landing-header/>
        {{ $slot }}
    </body>
</html>
