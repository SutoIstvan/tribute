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
    <title>@yield('title', 'Adatok szerkesztése - mbook.hu')</title>

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

    <nav class="navbar navbar-expand-lg">
        <div class="container">
    
            <!-- Logo -->
            <a class="logo" href="{{ route('welcome') }}">
                <img src="{{ asset('assets/imgs/logo-mbook.png') }}" alt="logo" style="height: 18px;">
            </a>
    
            <!-- navbar links -->
            <div class="topnav d-none d-lg-flex align-items-center">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Irányítópult</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('memorial.edit') ? 'active' : '' }}"
                            href="{{ route('memorial.edit', ['id' => $memorial->id]) }}">
                            Adatok szerkesztése
                        </a>
                    </li>
    
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('memorial.images.edit') ? 'active' : '' }}"
                            href="{{ route('memorial.images.edit', ['id' => $memorial->id]) }}">
                            Fényképek
                        </a>
                    </li>
    
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('memorial.comments') ? 'active' : '' }}"
                            href="{{ route('memorial.comments', ['id' => $memorial->id]) }}">Hozzászólások</a>
                    </li>
    
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="nav-link" style="background-color: #0e0f11; border: none;">
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </li>
    
                </ul>
            </div>
            <div class="menu-icon cursor-pointer d-lg-none">
                <span class="icon ti-align-right"></span>
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
                            <a href="#" class="link"><span class="fill-text" data-text="Címlap">Címlap</span></a>
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

            <footer class="footer-sa pb-80 ">
                <div class="sub-footer">
                    <div class="container pt-50">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="copy sub-color md-mb50">
                                    <p>© 2024 <a href="#0">MBook.hu</a>. Minden jog fenntartva.</p>
                                </div>
                            </div>
                            <div class="col-lg-4 d-flex justify-content-end">
                                <div class="links sub-color d-flex justify-content-between">
                                    <a href="#">Kezdőlap</a>
                                    <a href="#">Kapcsolatok</a>
                                    <a href="#">Hírek</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

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
