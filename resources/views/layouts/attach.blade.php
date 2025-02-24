<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <!-- Metas -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="keywords"
        content="emlékoldal, virtuális emlékmű, elhunytak emléke, emlékmű online, emlékhely, MBook, mbook, mbook.hu">
    <meta name="description"
        content="mbook.hu mbook – online emlékoldalak szeretteik emlékének megörökítésére. Készítsen virtuális emlékműveket, ossza meg emlékeit és fotóit.">


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

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js"
        integrity="sha512-k6/Bkb8Fxf/c1Tkyl39yJwcOZ1P4cRrJu77p83zJjN2Z55prbFHxPs9vN7q3l3+tSMGPDdoH51AEU8Vgo1cgAA=="
        crossorigin="anonymous"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css"
        integrity="sha512-3JRrEUwaCkFUBLK1N8HehwQgu8e23jTH4np5NHOmQOobuC4ROQxFwFgBLTnhcnQRMs84muMh0PnnwXlPq5MGjg=="
        crossorigin="anonymous" />

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

    {{-- <div class="cursor"></div> --}}

    <!-- ==================== Start progress-scroll-button ==================== -->

    <div class="progress-wrap cursor-pointer">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

    <!-- ==================== End progress-scroll-button ==================== -->

    <!-- ==================== Start Navbar ==================== -->

    <nav class="navbar navbar-expand-lg">
        <div class="container">
    
            <!-- Logo -->
            <a class="logo" href="{{ route('welcome') }}">
                <img src="{{ asset('assets/imgs/logo-mbook.png') }}" alt="logo" style="height: 18px;">
            </a>
    
            <div class="topnav d-flex align-items-center">
                @guest
                    {{-- Показываем только кнопку входа для гостей --}}
                    <a href="{{ route('login') }}" class="butn butn-rounded">
                        <div class="d-flex align-items-center">
                            <span>{{ __('Login') }}</span>
                            <span class="icon ml-10">
                                <img src="assets/common/imgs/icons/arrow-top-right.svg" alt="">
                            </span>
                        </div>
                    </a>
                @else
                    {{-- Показываем кнопки профиля и выхода для авторизованных пользователей --}}
                    {{-- <div class="text-end me-2 d-none d-sm-block">
                        <button type="button" class="butn butn-rounded" style="background-color: #0e0f11; color:#e9e9e9"
                            onclick="window.location.href='{{ route('profile.edit') }}'">
                            {{ __('memorial-admin.profile') }}
                        </button>
                    </div> --}}
    
                    <div class="text-end d-none d-sm-block">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="button" class="butn butn-rounded" style="background-color: #e9e9e9"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('memorial-admin.logout') }}
                            </button>
                        </form>
                    </div>
                @endguest
    
                <div class="menu-icon cursor-pointer d-md-none">
                    <span class="icon ti-align-right"></span>
                </div>
            </div>
        </div>
    </nav>
    
    <div class="hamenu">
        <div class="close-menu cursor-pointer ti-close"></div>
        <div class="container-fluid rest d-flex">
            <div class="menu-links">
                <ul class="main-menu rest">
                    <li>
                        <div class="o-hidden">
                            <a href="#" class="link"><span class="fill-text"
                                    data-text="Címlap">Címlap</span></a>
                        </div>
                    </li>
                    <li>
                        <div class="o-hidden">
                            <a href="#" class="link"><span class="fill-text"
                                    data-text="Életrajz">Életrajz</span></a>
                        </div>
                    </li>
                    <li>
                        <div class="o-hidden">
                            <a href="#" class="link"><span class="fill-text"
                                    data-text="Fényképek">Fényképek</span></a>
                        </div>
                    </li>
                    <li>
                        <div class="o-hidden">
                            <a href="#" class="link"><span class="fill-text" data-text="Videó">Videó</span></a>
                        </div>
                    </li>
                    <li>
                        <div class="o-hidden">
                            <a href="#" class="link"><span class="fill-text"
                                    data-text="Hozzászólások">Hozzászólások</span></a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="cont-info valign">
                <div class="text-center full-width">
                    <div class="logo">
                        <img src="{{ asset('assets/imgs/logo-mbook.png') }}" alt="">
                    </div>
                    <div class="social-icon mt-40">
                        <a href="#"> <i class="fab fa-facebook-f"></i> </a>
                        <a href="#"> <i class="fab fa-x-twitter"></i> </a>
                        <a href="#"> <i class="fab fa-linkedin-in"></i> </a>
                        <a href="#"> <i class="fab fa-instagram"></i> </a>
                    </div>
                    <div class="item mt-30">
                        <h5>Magyarorszag <br> Budapest, Madar utca 21</h5>
                    </div>
                    <div class="item mt-10">
                        <h5><a href="#0">info@tributehub.eu</a></h5>
                        <h5 class="underline"><a href="#0">+36 841 25 69</a></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- ==================== End Navbar ==================== -->

    <div id="smooth-wrapper">

        <div id="smooth-content">

            <main>

                @yield('content')

            </main>

            <!-- ==================== Start Footer ==================== -->

            @include('layouts.partials.footer')

            <!-- ==================== End Footer ==================== -->

        </div>

    </div>

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
