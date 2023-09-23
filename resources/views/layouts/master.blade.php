<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title></title>
    <meta name="description"
        content="240+ Best Bootstrap Templates are available on this website. Find your template for your project compatible with the most popular HTML library in the world." />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Add site Favicon -->
    <link rel="shortcut icon" href="{{ asset('frontend/assets/img/favicon.png') }}" type="image/png" />

    <!-- CSS
    ========================= -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Metal+Mania&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/icofont.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css') }}" />
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/custom.css') }}" />
</head>

<body class="body__bg" data-bgimg="{{ asset('frontend/assets/img/bg/body-bg.webp') }}">

    {{-- main navbar --}}
    @include('layouts.main-navbar')

    {{-- mobile navbar --}}
    @include('layouts.offcanvas-navbar')

    {{-- main content of the pages --}}
    @yield('content')

    {{-- contact us section --}}
    @include('layouts.contact-us')

    {{-- footer --}}
    @include('layouts.footer')

    <!-- JS
============================================ -->
    <!--modernizr min js here-->
    <script src="{{ asset('frontend/assets/js/vendor/modernizr-3.7.1.min.js') }}"></script>

    <!-- Vendor JS -->
    <script src="{{ asset('frontend/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-migrate-3.3.2.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/popper.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.nice-select.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.j') }}s"></script>
    <script src="{{ asset('frontend/assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery-waypoints.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/custom.js') }}"></script>
</body>

</html>
