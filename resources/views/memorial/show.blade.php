@extends('layouts.memorial')

@section('title', $memorial->name . ' - mbook.hu')

@section('content')
    <!-- ==================== Start Header ==================== -->

    <header class="header-dm section-padding">
        <div class="container-xl position-re">
            <div class="row">
                <div class="col-lg-9">
                    <div class="caption" style="mix-blend-mode: difference;">
                        <h1 style="font-size: 50px">{{ $memorial->name }}</h1>
                    </div>
                    <div class="row md-hide">
                        <div class="col-lg-6 imgs-cube">
                            <div class="imgs">
                                <div class="circle">
                                    <img src="{{ asset('assets/imgs/header/circle-badge4.png') }}" alt="">
                                </div>
                            </div>
                            {{-- <div class="img fit-img radius-30 mt-50">
                                <img src="{{ asset('images/memorials/' . $memorial->id . '/' . $memorial->photo) }}"
                                    alt="">
                            </div> --}}

                            <div class="img fit-img radius-30 mt-50">
                                @if ($images->isNotEmpty())
                                    <!-- Используем первую картинку из массива $images -->
                                    <img src="{{ asset('storage/' . $images->first()->image_path) }}"
                                        alt="Изображение мемориала">
                                @elseif ($memorial->photo)
                                    <!-- Если массив $images пустой, используем изображение из $memorial->photo -->
                                    <img src="{{ asset('storage/images/memorials/' . $memorial->id . '/' . $memorial->photo) }}"
                                        alt="Изображение мемориала">
                                @else
                                    <!-- Если нет ни одной картинки, выводим заглушку -->
                                    <img src="{{ asset('path/to/default/image.jpg') }}" alt="">
                                @endif
                            </div>

                            {{-- @if ($memorial->photo)
                            <img src="{{ asset('storage/' . $memorial->photo) }}" alt="Фото">
                        @endif --}}

                        </div>
                    </div>
                </div>
            </div>
            <div class="mimg fit-img">

                {{-- <div class="mimg fit-img" style="filter: grayscale(100%);"> --}}
                <img src="{{ asset('storage/images/memorials/' . $memorial->id . '/' . $memorial->photo) }}" alt="">
                <div class="text">
                    <span class="fz-14 text-u mb-10">{{ $memorial->birth_date }} - {{ $memorial->death_date }}</span>
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
            <div class="text-center">
                <h7>
                    {{ Str::limit($memorial->biography, 800) }}
                </h7>
            </div>
            @if (strlen($memorial->biography) > 800)
                <div class="text-center mt-80">
                    <a href="#" class="butn butn-md butn-bord butn-rounded">
                        <div class="d-flex align-items-center">
                            <span>Bővebben az életrajzról</span>
                            <span class="icon pe-7s-angle-right ml-10 fz-30"></span>
                        </div>
                    </a>
                </div>
            @endif
        </div>
    </section>



    <!-- ==================== Start Portfolio ==================== -->


    <section class="works-dm section-padding">
        <div class="container">
            <div class="gallery row md-marg">
                <!-- Первый блок (первая картинка из $images) -->
                @if ($images->isNotEmpty())
                    <div class="items col-lg-6 order-md-2">
                        <div class="item">
                            <div class="img">
                                <img src="{{ asset('storage/' . $images->first()->image_path) }}"
                                    alt="Изображение мемориала">
                            </div>
                            <div class="cont mt-30">
                                <div class="info sub-color mb-10">
                                    @if ($images->isNotEmpty())
                                        <div class="info sub-color mb-10">
                                            @if ($images->first()->image_date)
                                                <span>{{ $images->first()->image_date }}</span>
                                                <span class="dot"></span>
                                            @endif
                                            @if ($images->first()->image_description)
                                                <span>{{ $images->first()->image_description }}</span>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Заголовок (статический) -->
                    <div class="items col-lg-6 order-md-1">
                        <div class="sec-head">
                            <h6 class="sub-head mb-15">Fényképek az elhunytról</h6>
                            <h2 class="fz-50">Vessen egy pillantást<br> a fényképekre</h2>
                        </div>
                    </div>

                    <!-- Остальные картинки (начиная со второй) -->
                    @if ($images->count() > 1)
                        @foreach ($images->slice(1) as $image)
                            <div class="items col-lg-6 order-md-2">
                                <div class="item">
                                    <div class="img">
                                        <img src="{{ asset('storage/' . $image->image_path) }}">
                                    </div>
                                    <div class="cont mt-30">
                                        <div class="info sub-color mb-10">
                                            @if ($image->image_date)
                                                <span>{{ $image->image_date }}</span>
                                                <span class="dot"></span>
                                            @endif
                                            @if ($image->image_description)
                                                <span>{{ $image->image_description }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif


                    <div class="items col-lg-6 order-md-2">
                        <a href="#" class="">
                            <div class="d-flex">
                                <a href="{{ route('comments.create', $memorial->id) }}" class="butn butn-md butn-bord butn-rounded">
                                    <div class="d-flex align-items-center">
                                        <span>Tekintse meg az összes fényképet</span>
                                        <span class="icon pe-7s-angle-right ml-10 fz-30"></span>
                                    </div>
                                </a>
                            </div>
                        </a>
                    </div>

                @endif
            </div>
        </div>
    </section>

    <!-- ==================== Start Intro-vid ==================== -->
    @if (!empty($memorial->video))
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


        <section class="intro-vid ontop">
            <div class="container">

                {{-- <div class="bg-img" data-background="{{ asset('storage/images/memorials/' . $memorial->id . '/' . $memorial->photo) }}"> --}}
                @if (!empty($memorial->video_img))
                    <div class="bg-img" data-background="{{ $memorial->video_img }}">
                    @else
                    <div class="bg-img" data-background="{{ asset('storage/images/memorials/' . $memorial->id . '/' . $memorial->photo) }}">
                @endif
                <div class="play-button">
                    <a href="{{ $memorial->video }}" class="vid">
                        <i class="fas fa-play"></i>
                    </a>
                </div>
            </div>
            </div>
        </section>
    @endif
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


                    @forelse($comments as $comment)
                        <div class="swiper-slide">
                            <div class="item">
                                <div class="d-flex mb-30">
                                    <div class="img">
                                        {{-- <div class="fit-img"> --}}
                                        <div class="fit-img">
                                            <img src="{{ asset('assets/imgs/header/circle-badge4.png') }}"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="ml-auto">
                                        <span class="sub-color"></span>
                                    </div>
                                </div>
                                <h5>“{{ $comment->content }}”</h5>
                                <div class="d-flex justify-content-between mt-30 w-100">
                                    <span class="sub-color">{{ $comment->name }}</span>
                                    <span class="sub-color">{{ $comment->created_at->format('Y.m.d') }}</span>
                                </div>

                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500">Még nincsenek hozzászólások</p>
                    @endforelse




                </div>
                <div class="swiper-pagination"></div>
            </div>

            <div class="text-center mt-40">

                <div class="text-center mt-80">
                    <a href="{{ route('comments.create', $memorial->id) }}" class="butn butn-md butn-bord butn-rounded">
                        <div class="d-flex align-items-center">
                            <span>Szólj hozzá</span>
                            <span class="icon pe-7s-angle-right ml-10 fz-30"></span>
                        </div>
                    </a>
                    <a href="{{ route('comments.create', $memorial->id) }}"
                        class="butn butn-md butn-bord butn-rounded me-3 mt-30 mb-10">
                        <div class="d-flex align-items-center">
                            <span>{{ $memorial->comments()->count() }}</span>
                            <span class="icon pe-7s-chat ml-10 fz-30"></span>
                        </div>
                    </a>
                </div>


            </div>

        </div>
    </section>

    <!-- ==================== End Testimonials ==================== -->
@endsection
