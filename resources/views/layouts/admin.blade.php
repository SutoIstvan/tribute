<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <!-- Metas -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="keywords" content="HTML5 Template Hubfolio Multi-Purpose themeforest">
    <meta name="description" content="Hubfolio - Multi-Purpose HTML5 Template">
    <meta name="author" content="">

    <!-- Title  -->
    <title>@yield('title', 'mbook.hu')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/imgs/favicon.ico') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    <!-- Plugins -->
    <link rel="stylesheet" href="{{ asset('assets/common/css/plugins.css') }}">

    <!-- Core Style Css -->
    <link rel="stylesheet" href="{{ asset('assets/common/css/common_style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/home7-style.css') }}">

    <!-- CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<!-- Для локализации на венгерский -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.hu.min.js"></script>

    @yield('css')
</head>

<body>

    <!-- ==================== Start Loading ==================== -->

    <div class="loader-wrap">
        <svg viewBox="0 0 1000 1000" preserveAspectRatio="none">
            <path id="svg" d="M0,1005S175,995,500,995s500,5,500,5V0H0Z"></path>
        </svg>

        <div class="loader-wrap-heading">
            <div class="load-text">
                <span>M</span>
                <span>B</span>
                <span>o</span>
                <span>o</span>
                <span>k</span>
            </div>
        </div>
    </div>

    <!-- ==================== End Loading ==================== -->

    <div class="cursor"></div>

    <!-- ==================== Start progress-scroll-button ==================== -->

    <div class="progress-wrap cursor-pointer">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

    <!-- ==================== End progress-scroll-button ==================== -->

    <!-- ==================== Start Navbar ==================== -->

    @include('layouts.navadmin')

    <!-- ==================== End Navbar ==================== -->

    <div id="smooth-wrapper">

        <div id="smooth-content">

            <main>

                @yield('content')

            </main>

            <!-- ==================== Start Footer ==================== -->

            @include('layouts.footeradmin')

            <!-- ==================== End Footer ==================== -->

        </div>

    </div>

    <!-- jQuery -->
    <script src="{{ asset('assets/common/js/lib/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/common/js/lib/jquery-migrate-3.4.0.min.js') }}"></script>

    <!-- plugins -->
    <script src="{{ asset('assets/common/js/lib/plugins.js') }}"></script>

    <!-- GSAP -->
    <script src="{{ asset('assets/common/js/gsap_lib/gsap.min.js') }}"></script>
    <script src="{{ asset('assets/common/js/gsap_lib/ScrollSmoother.min.js') }}"></script>
    <script src="{{ asset('assets/common/js/gsap_lib/ScrollTrigger.min.js') }}"></script>
    <script src="{{ asset('assets/common/js/gsap_lib/SplitText.min.js') }}"></script>

    <!-- common scripts -->
    <script src="{{ asset('assets/common/js/common_scripts.js') }}"></script>

    <!-- custom scripts -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>

    @yield('js')
    
</body>

</html>
