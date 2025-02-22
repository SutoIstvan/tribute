<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <!-- Metas -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="keywords" content="emlékoldal, virtuális emlékmű, elhunytak emléke, emlékmű online, emlékhely, MBook, mbook, mbook.hu">
    <meta name="description" content="mbook.hu mbook – online emlékoldalak szeretteik emlékének megörökítésére. Készítsen virtuális emlékműveket, ossza meg emlékeit és fotóit.">


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


<!-- Bootstrap CSS -->
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}

<!-- jQuery -->
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

<!-- Bootstrap JS -->
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> --}}


{{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" /> --}}

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js" integrity="sha512-k6/Bkb8Fxf/c1Tkyl39yJwcOZ1P4cRrJu77p83zJjN2Z55prbFHxPs9vN7q3l3+tSMGPDdoH51AEU8Vgo1cgAA==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" integrity="sha512-3JRrEUwaCkFUBLK1N8HehwQgu8e23jTH4np5NHOmQOobuC4ROQxFwFgBLTnhcnQRMs84muMh0PnnwXlPq5MGjg==" crossorigin="anonymous" />


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

    @include('layouts.navattach')

    <!-- ==================== End Navbar ==================== -->

    <div id="smooth-wrapper">

        <div id="smooth-content">

            <main>

                @yield('content')

            </main>

            <!-- ==================== Start Footer ==================== -->

            @include('layouts.footer')

            <!-- ==================== End Footer ==================== -->

        </div>

    </div>

    <!-- jQuery -->
    {{-- <script src="{{ asset('assets/common/js/lib/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/common/js/lib/jquery-migrate-3.4.0.min.js') }}"></script> --}}

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
