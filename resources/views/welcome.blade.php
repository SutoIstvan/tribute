@extends('layouts.home')

@section('title', 'mbook.hu')

@section('content')
    <!-- ==================== Start Header ==================== -->

    <header class="header-dm section-padding">
        <div class="container-xl position-re">
            <div class="row">
                <div class="col-lg-9">
                    <div class="caption">
                        <h1>Robin Williams</h1>
                    </div>
                    <div class="row md-hide">
                        <div class="col-lg-6 imgs-cube">
                            <div class="imgs">
                                <div class="circle">
                                    <img src="assets/imgs/header/circle-badge4.png" alt="">
                                </div>
                            </div>
                            <div class="img fit-img radius-30 mt-50">
                                <img src="assets/imgs/header/5.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mimg fit-img">
                <img src="assets/imgs/header/man.png" alt="">
                <div class="text">
                    <span class="fz-14 text-u mb-10">1951 - 2014</span>
                    <p style="margin-left: 25px;">Míg éltél szerettünk<br> míg élünk nem feledünk!</p>
                    <div class="shaps bottom">
                        <div class="shap-left-top">
                            <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
                                <path
                                    d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                    fill="#0e0f11"></path>
                            </svg>
                        </div>
                        <div class="shap-right-bottom">
                            <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
                                <path
                                    d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                    fill="#0e0f11"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                {{-- <div class="absolute" style="position: absolute; top: 387px; left: 350px;">
                    <img src="assets/imgs/header/circle-badge4.png" style="width: 180px;" alt="Иконка">
                </div> --}}
            </div>
        </div>
    </header>

    <!-- ==================== End Header ==================== -->

    <section class="awards-sa ">
        <div class="container">
            <div class="sec-head mb-100">
                <div class="row">
                    <div class="col-lg-5">
                        <h6 class="sub-head">Életrajz</h6>
                    </div>
                    <div class="col-lg-7">

                        <h4>Az élet utolsó fejezete:
                            <span class="sub-color inline">Egy személyes történet, amely örökre megmarad.</span>
                        </h4>
                    </div>
                </div>
            </div>
            <div>
                <h7>
                    Williams 1951. július 21-én született Chicagóban (Illinois állam). Édesapja
                    Robert Fitzgerald Williams (1906–1987) a Ford Motor Company vezető munkatársa
                    volt. Édesanyja Laura McLaurin (született Smith, 1922–2001) egykori modell New
                    Orleansból. Felmenői között akadt angol, walesi, ír és francia is. Anyai ükapja
                    Anselm J. McLaurin politikus, aki volt szenátor, illetve Mississippi állam
                    kormányzója is.

                </h7>

            </div>
            <div class="text-center mt-80">
                <a href="../inner_pages/about.html" class="butn butn-md butn-bord butn-rounded">
                    <div class="d-flex align-items-center">
                        <span>Bővebben az életrajzról</span>
                        <span class="icon pe-7s-angle-right ml-10 fz-30"></span>
                    </div>
                </a>
            </div>
        </div>
    </section>



    <!-- ==================== Start Portfolio ==================== -->

    <section class="works-dm section-padding">
        <div class="container">
            <div class="gallery row md-marg">
                <div class="items col-lg-6 order-md-2">
                    <div class="item">
                        <div class="img">
                            <img src="assets/imgs/works/6.png" alt="">
                            <!-- <div class="tags">
                                                    <a href="#0">Development</a>
                                                    <a href="#0">UI/UX</a>
                                                    <a href="#0">illustration</a>
                                                </div> -->
                        </div>
                        <div class="cont mt-30">
                            <div class="info sub-color mb-10">
                                <span>2023</span>
                                <span class="dot"></span>
                                <span>A szülővárosomban</span>
                            </div>
                            {{-- <h6>
                                <a href="../inner_pages/project-details.html">Archin Architecture Studio</a>
                            </h6> --}}
                        </div>
                    </div>
                </div>
                <div class="items col-lg-6 order-md-1">
                    <div class="sec-head">
                        <h6 class="sub-head mb-15">Fényképek az elhunytról</h6>
                        <h2 class="fz-50">Vessen egy pillantást<br> a
                            fényképekre</h2>
                    </div>
                </div>
                <div class="items col-lg-6 order-md-2">
                    <div class="item">
                        <div class="img">
                            <img src="assets/imgs/works/5.jpg" alt="">
                            <!-- <div class="tags">
                                                    <a href="#0">Development</a>
                                                    <a href="#0">UI/UX</a>
                                                    <a href="#0">illustration</a>
                                                </div> -->
                        </div>
                        <div class="cont mt-30">
                            <div class="info sub-color mb-10">
                                <span>2023</span>
                                <span class="dot"></span>
                                <span>Kirándulás Párizsba</span>
                            </div>
                            <!-- <h6>
                                                    <a href="../inner_pages/project-details.html">Unerio Residential Complex
                                                        Landing page</a>
                                                </h6> -->
                        </div>
                    </div>
                </div>
                <div class="items col-lg-6 order-md-2">
                    <div class="item">
                        <div class="img">
                            <img src="assets/imgs/works/6.jpg" alt="">
                            <!-- <div class="tags">
                                                    <a href="#0">Development</a>
                                                    <a href="#0">UI/UX</a>
                                                    <a href="#0">illustration</a>
                                                </div> -->
                        </div>
                        <div class="cont mt-30">
                            <div class="info sub-color mb-10">
                                <span>2023</span>
                                <span class="dot"></span>
                                <span>Kedvenc hely</span>
                            </div>
                            <!-- <h6>
                                                    <a href="../inner_pages/project-details.html">Jorger Clarkson - Architect
                                                        Personal Portfolio</a>
                                                </h6> -->
                        </div>
                    </div>
                </div>
                <div class="items col-lg-6 order-md-2">
                    <div class="item">
                        <div class="img">
                            <img src="assets/imgs/works/8.jpg" alt="">
                            <!-- <div class="tags">
                                                    <a href="#0">Development</a>
                                                    <a href="#0">UI/UX</a>
                                                    <a href="#0">illustration</a>
                                                </div> -->
                        </div>
                        <div class="cont mt-30">
                            <div class="info sub-color mb-10">
                                <span>2023</span>
                                <span class="dot"></span>
                                <span>Munkahely az irodában</span>
                            </div>
                            <!-- <h6>
                                                    <a href="../inner_pages/project-details.html">Newz - Magazine Site</a>
                                                </h6> -->
                        </div>
                    </div>
                </div>
                <div class="items col-lg-6 order-md-2">
                    <a href="../inner_pages/portfolio-gallery.html" class="crv-butn mt-100">
                        <div class="d-flex">
                            <span class="text">Tekintse meg az összes fényképet</span>
                            <span class="icon">
                                <img src="assets/common/imgs/icons/arrow-top-right.svg" alt="">
                            </span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== End Portfolio ==================== -->



    <!-- ==================== Start Services ==================== -->

    <section class="services-dm sub-bg radius-30 section-padding">
        <div class="container pt-0">
            <div class="sec-head mb-100">
                <div class="row">
                    <div class="col-lg-4">
                        <h6 class="sub-head">Videó az elhunytról</h6>
                    </div>
                    <div class="col-lg-5">
                        <h3 class="text-indent md-mb15">Gyönyörű emlékezetes pillanatok az életből
                        </h3>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- ==================== End Services ==================== -->



    <!-- ==================== Start Intro-vid ==================== -->

    <section class="intro-vid ontop">
        <div class="container">
            <div class="bg-img" data-background="assets/imgs/intro2.jpg">
                <div class="play-button">
                    <a href="https://youtu.be/AzwC6umvd1s" class="vid">
                        <i class="fas fa-play"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== End Intro-vid ==================== -->



    <!-- ==================== Start Testimonials ==================== -->

    <section class="testimonials-dm section-padding pb-80 ">
        <div class="container">
            <div class="sec-head mb-100">
                <div class="row">
                    <div class="col-lg-5">
                        <h6 class="sub-head">Amit a család mond</h6>
                    </div>
                    <div class="col-lg-7">
                        <h3 class="text-indent">Legfrissebb megjegyzések <br>rokonoktól és szeretteinktől
                        </h3>

                    </div>
                </div>
            </div>
            <div class="swiper process-swiper swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="item">
                            <div class="d-flex mb-30">
                                <div class="img">
                                    <div class="fit-img">
                                        <img src="assets/imgs/testim/avatar1.jpg" alt="">
                                    </div>
                                </div>
                                <div class="ml-auto">
                                    <span class="sub-color"></span>
                                </div>
                            </div>
                            <h5>“Fényes emléke tovább él... Jósága és bölcsessége örökre a szívünkben marad.”</h5>
                            <div class="d-flex mt-30">
                                <span class="sub-color">Aaron Beck</span>
                                <!-- <div class="stars ml-auto">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="item">
                            <div class="d-flex mb-30">
                                <div class="img">
                                    <div class="fit-img">
                                        <img src="assets/imgs/testim/avatar2.jpg" alt="">
                                    </div>
                                </div>
                                <div class="ml-auto">
                                    <span class="sub-color"></span>
                                </div>
                            </div>
                            <h5>“Elment, de melegséget és fényt hagyott maga után. Nyugodjék békében.”</h5>
                            <div class="d-flex mt-30">
                                <span class="sub-color">Aaron Beck</span>
                                <!-- <div class="stars ml-auto">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="item">
                            <div class="d-flex mb-30">
                                <div class="img">
                                    <div class="fit-img">
                                        <img src="assets/imgs/testim/avatar3.jpg" alt="">
                                    </div>
                                </div>
                                <div class="ml-auto">
                                    <span class="sub-color"></span>
                                </div>
                            </div>
                            <h5>“Gyászolunk... Távozása helytelenség mindazok számára, akik ismerték.”</h5>
                            <div class="d-flex mt-30">
                                <span class="sub-color">Aaron Beck</span>
                                <!-- <div class="stars ml-auto">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="item">
                            <div class="d-flex mb-30">
                                <div class="img">
                                    <div class="fit-img">
                                        <img src="assets/imgs/testim/avatar4.jpg" alt="">
                                    </div>
                                </div>
                                <div class="ml-auto">
                                    <span class="sub-color"></span>
                                </div>
                            </div>
                            <h5>“Részvétünk... Élete példa volt sokak számára. Nyugodjék békében.”</h5>
                            <div class="d-flex mt-30">
                                <span class="sub-color">Aaron Beck</span>
                                <!-- <div class="stars ml-auto">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="item">
                            <div class="d-flex mb-30">
                                <div class="img">
                                    <div class="fit-img">
                                        <img src="assets/imgs/testim/avatar3.jpg" alt="">
                                    </div>
                                </div>
                                <div class="ml-auto">
                                    <span class="sub-color"></span>
                                </div>
                            </div>
                            <h5>“Nyomot hagyott mindazok szívében, akik ismerték. Fényes emléke tovább él...”</h5>
                            <div class="d-flex mt-30">
                                <span class="sub-color">Aaron Beck</span>
                                <!-- <div class="stars ml-auto">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <!-- ==================== End Testimonials ==================== -->
@endsection
