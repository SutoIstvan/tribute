@extends('layouts.attach')

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
            background-image: url('../../circle.png');
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
            /* background-image: url('circle.png'); */
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
    </style>
@endsection

@section('title', 'Adat mentés - mbook.hu')

@section('content')

    <div class="container">
        <div class=" text-secondary text-center">

            <div class="py-5">
                <div class="d-flex justify-content-center">
                    <div class="holder">
                        <div class="candle">
                            <div class="blinking-glow"></div>
                            <div class="thread"></div>
                            <div class="glow"></div>
                            <div class="flame"></div>
                        </div>
                    </div>
                </div>
                <h4>
                    <span class="sub-color inline">Köszönjük, hogy minket választott.</span>
                </h4>

                <h1 class="display-5 fw-bold text-white mt-15">Fogadja őszinte részvétünket a veszteségért.</h1>
                <div class="col-lg-6 mx-auto">
                    <p class="fs-5 mt-4 mb-4">
                        Az alábbiakban rögzítheti az elhunyt adatait, amelyeket később bármikor módosíthat vagy
                        kiegészíthet.
                        Töltse fel a fő fotót és néhány emlékezetes fényképét.
                    </p>
                </div>
            </div>
        </div>
    </div>


    <form action="{{ route('memorial.save') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="container">
            <div class="row d-flex justify-content-center">


                <div class="col-12 col-md-3 p-4">
                    <h3>Elhunyt adatai</h3>
                    <p class="mt-2">Kérjük, tüntesd fel a következő információkat: Teljes név, Születési dátum,
                        Elhalálozás dátum.</p>
                </div>

                <div class="col-12 col-md-7 p-3">
                    <div class="container">
                        <div class="row">
                            <div class="mb-35">
                                <label for="fullName" class="form-label text-white">Teljes név</label>
                                <input name="name" type="text" class="form-control bg-dark text-white border-secondary py-2"
                                    id="fullName" placeholder="Teljes név">
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="birth_date" class="form-label text-white">Születési dátum</label>
                                <input name="birth_date" type="text"
                                    class="form-control bg-dark text-white border-secondary py-2 datepicker" id="birth_date"
                                    placeholder="00.00.0000">
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="death_date" class="form-label text-white">Elhalálozás dátuma</label>
                                <input name="death_date" type="text" class="form-control bg-dark text-white border-secondary py-2"
                                    id="death_date" placeholder="00.00.0000">
                            </div>
                            <div class="mt-30">
                                <label for="story" class="form-label text-white">Emlékezés, tiszteletadás</label>
                                <textarea name="story" class="form-control bg-dark text-white border-secondary" id="story" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>


        <div class="container">
            <div class="row d-flex justify-content-center">


                <div class="col-12 col-md-3 p-4 mt-50">
                    <h3>Életrajz</h3>
                    <p class="mt-2">Oszd meg velünk kedves emlékeidet, a számára fontos pillanatokat vagy azt, amit
                        szerettél benne a legjobban.</p>
                </div>

                <div class="col-12 col-md-7 p-3">
                    <div class="container">
                        <div class="row">
                            <div class="mt-30">
                                <label for="biography" class="form-label text-white">Életrajz</label>
                                <textarea name="biography" class="form-control bg-dark text-white border-secondary" id="biography" rows="8"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="container mt-100 mb-50">

            <!--Avatar-->
            <div>
                <div class="d-flex justify-content-center mt-100 mb-50">
                    <img id="selectedAvatar" src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg"
                        class="rounded-circle" style="width: 200px; height: 200px; object-fit: cover;"
                        alt="example placeholder" />
                </div>
                <div class="d-flex justify-content-center">
                    <div data-mdb-ripple-init class="btn btn-primary btn-rounded">
                        <label class="form-label text-white m-1" for="customFile2">Choose file</label>
                        <input name="image" type="file" class="form-control d-none" id="customFile2"
                            onchange="displaySelectedImage(event, 'selectedAvatar')" />
                    </div>
                </div>
            </div>
    
        </div>

        {{-- <div class="container">
        <div class="row d-flex justify-content-center mt-4 mb-50">
            <div class="col-12 col-md-3 p-4">
                <h3 class="text-white">Fényképek</h3>
                <p class="mt-2 text-white-50">Töltsön fel néhány fényképet, később dátumot és további adatokat is megadhat.</p>
            </div>

            <div class="col-12 col-md-7 p-3 ">
                <div class="container">
                    <div class="card bg-dark border-warning">
                        <form method="post" action="{{url('images/store')}}" enctype="multipart/form-data"
                            class="dropzone bg-dark text-white" id="dropzone">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


        <div class="text-center mb-70 mt-40">
            <button type="submit" class="butn butn-md butn-bord butn-rounded">
                <div class="d-flex align-items-center">
                    <span>Adatok mentése</span>
                    <span class="icon pe-7s-angle-right ml-10 fz-30"></span>
                </div>
            </button>
        </div>

    </form>

    </html>


@endsection

@section('js')
    <script type="text/javascript">
        function displaySelectedImage(event, elementId) {
            const selectedImage = document.getElementById(elementId);
            const fileInput = event.target;

            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    selectedImage.src = e.target.result;
                };

                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    </script>
@endsection
