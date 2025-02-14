@extends('layouts.admin')

@section('css')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.js"></script>

    <style>
        :before,
        :after {
            margin: 0;
            padding: 0;
            word-break: break-all;
            box-sizing: border-box;
            scroll-behavior: smooth;
        }

        .holder {
            background-image: url('circle.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            width: 100%;
            height: 100vh;
        }

        .holder {
            margin: 0rem auto 0;
            width: 150px;
            height: 400px;
            position: relative;
        }

        .holder *,
        .holder *:before,
        .holder *:after {
            position: absolute;
            content: "";
        }

        .candle {
            bottom: 243px;
            width: 150px;
            background-image: url('circle.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .flame {
            width: 18px;
            height: 80px;
            left: 50%;
            transform-origin: 50% 100%;
            transform: translateX(-50%);
            bottom: 100%;
            border-radius: 50% 50% 20% 20%;
            background: rgba(255, 255, 255, 1);
            background: linear-gradient(white 80%, transparent);
            animation: moveFlame 6s linear infinite, enlargeFlame 5s linear infinite;
        }

        .flame:before {
            left: 1%;
            width: 100%;
            height: 100%;
            border-radius: 50% 50% 20% 20%;
            box-shadow: 0 0 15px 0 rgba(132, 66, 25, 0.4), 0 -6px 4px 0 rgba(247, 128, 0, .7);
        }

        @keyframes moveFlame {

            0%,
            100% {
                transform: translateX(-50%) rotate(-2deg);
            }

            50% {
                transform: translateX(-50%) rotate(2deg);
            }
        }

        @keyframes enlargeFlame {

            0%,
            100% {
                height: 80px;
            }

            50% {
                height: 100px;
            }
        }

        .glow {
            width: 22px;
            height: 60px;
            border-radius: 50% 50% 35% 35%;
            left: 50%;
            top: -48px;
            transform: translateX(-50%);
            background: rgba(0, 132, 255, 0.207);
            box-shadow: 0 -40px 30px 0 #dc8a0c, 0 40px 50px 0 #dc8a0c, inset 3px 0 2px 0 rgba(0, 133, 255, .6), inset -3px 0 2px 0 rgba(0, 133, 255, .6);
        }

        .glow:before {
            width: 70%;
            height: 60%;
            left: 50%;
            transform: translateX(-50%);
            bottom: 0;
            border-radius: 50%;
            background: rgba(199, 11, 11, 0.35);
        }

        .blinking-glow {
            width: 100px;
            height: 180px;
            left: 50%;
            top: -55%;
            transform: translate(-50%, -70%);

            border-radius: 50%;
            background: #ff62008b;
            filter: blur(60px);
            animation: blinkIt .1s infinite;
        }

        @keyframes blinkIt {
            50% {
                opacity: .8;
            }
        }



        .dropzone .dz-preview.dz-image-preview {
            background: #212529 !important;
        }

        .dropzone .dz-preview .dz-remove {
            margin-top: 10px;
        }

        .card-memorial {
            padding: 15px;
            width: 350px;
            background: #222;
            border-radius: 5px;
            text-align: center;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.7);
            user-select: none;
        }

        .cover-photo {
            position: relative;
            background-size: cover;
            border-radius: 5px 5px 0 0;
        }

        .profile {
            position: absolute;
            width: 120px;
            height: 120px;
            bottom: -60px;
            left: 15px;
            border-radius: 50%;
            border: 2px solid #222;
            background: #222;
            padding: 5px;
            object-fit: cover;
        }

        .profile-name {
            font-size: 25px;
            margin: 5px 0 0 120px;
            color: #fff;
        }

        .about {
            margin-top: 30px;
            line-height: 1.6;
        }

        .pricing-pg .item {
            padding: 45px;
            background: var(--bg-color);
        }

        .fit-img img {
            width: 100%;
            height: 100%;
            -o-object-fit: cover;
            object-fit: cover;
            -o-object-position: center center;
            object-position: center center;
        }

        img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-radius: 10px;
        }
    </style>
@endsection

@section('title', 'Irányítópult - mbook.hu')

@section('content')




    <div class="container">
        <div class="section-padding text-secondary text-center">



            <div class="">

                <h4>
                    <span class="sub-color inline">Az irányítópultban</span>
                </h4>

                {{-- <h1 class="display-5 fw-bold text-white mt-15">Fogadja őszinte részvétünket a veszteségért.</h1> --}}
                <div class="col-lg-6 mx-auto">
                    <p class="fs-5 mt-4 mb-4">
                         szerkesztheti a meglévő emlékoldalakat és új oldalakat adhat hozzá elhunyt szeretteinek.
                    </p>
                </div>
            </div>
        </div>
    </div>


    <section class="pricing-pg mb-100">
        <div class="container">
            <div class="row">
                <form action="{{ route('memorial.imagesstore') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="title" placeholder="Название">
                    <input type="file" name="images[]" multiple>
                    <button type="submit">Создать</button>
                </form>
                
            </div>
        </div>
    </section>



    </html>


@endsection

@section('js')

@endsection
