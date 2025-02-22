@extends('layouts.edit')

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


        .drag-area {
            position: relative;
            height: 290px;
            border: 1.4px dashed #6c757d;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            margin: 1px auto;
        }

        .drag-area .icon {
            font-size: 50px;
            color: #fefefe;
        }

        .drag-area .header {
            font-size: 18px;
            font-weight: 500;
            color: #a4a4a4;
        }

        .drag-area .support {
            font-size: 12px;
            color: gray;
            margin: 10px 0 15px 0;
        }

        .drag-area .button {
            font-size: 16px;
            font-weight: 500;
            color: #fafafa;
            cursor: pointer;
            background-color: #5b5e60;
        }

        .drag-area.active {
            border: 1px solid #787878;
        }

        .drag-area img {
            width: 100%;
            height: 100%;
            border-radius: 4px;
            object-fit: cover;
        }

        .deleteBtn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: rgba(255, 0, 0, 0.7); /* Полупрозрачный красный фон */
            color: white;
            border: none;
            padding: 5px 10px;
            font-size: 14px;
            border-radius: 50%;
            cursor: pointer;
            transition: background 0.3s;
        }
    </style>
@endsection

@section('title', 'Adatok szerkesztése - mbook.hu')

@section('content')

    <div class="container">
        <div class="section-padding text-secondary text-center">

            <div class="">

                <h4>
                    <span class="sub-color inline">Adatok szerkesztése</span>
                </h4>

                <h1 class="display-5 fw-bold text-white mt-15">{{ $memorial->name }}</h1>
                <div class="col-lg-6 mx-auto">
                    <p class="fs-5 mt-4 mb-4">
                        Ezen az oldalon módosíthatja szerettei adatait. A mentéshez kattintson a módosítások mentése gombra az oldal alján.
                    </p>
                </div>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



    <form action="{{ route('memorial.update', $memorial->id) }}" method="POST" enctype="multipart/form-data" id="form">
        @csrf
        @method('PUT')

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
                                <input name="name" type="text"
                                    class="form-control bg-dark text-white border-secondary py-2" id="fullName"
                                    placeholder="Teljes név" value="{{ $memorial->name }}">
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="birth_date" class="form-label text-white">Születési dátum</label>
                                <input name="birth_date" type="text"
                                    class="form-control bg-dark text-white border-secondary py-2 datepicker" id="birth_date"
                                    placeholder="00.00.0000" value="{{ $memorial->birth_date }}">
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="death_date" class="form-label text-white">Elhalálozás dátuma</label>
                                <input name="death_date" type="text"
                                    class="form-control bg-dark text-white border-secondary py-2" id="death_date"
                                    placeholder="00.00.0000" value="{{ $memorial->death_date }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row d-flex justify-content-center">

                <div class="col-12 col-md-3 p-4 mt-50">
                    <h3>Fő emlékkép</h3>
                    <p class="mt-2">Ez a fénykép fog elsőként megjelenni az emlékoldalon.</p>
                </div>

                <div class="col-12 col-md-7 p-3 mt-50">
                    <div class="container">
                        <div class="row">
                            <div class="container">
                                <label for="biography" class="form-label text-white">Fő emlékkép feltöltése</label>
                                <div class="drag-area bg-dark text-white border-secondary">
                                    <!-- Если фото существует, отображаем его -->
                                    @if(isset($memorial->photo) && $memorial->photo)
                                        <img src="{{ asset('storage/images/memorials/' . $memorial->id . '/' . $memorial->photo) }}" alt="Фото">
                                        <button type="button" class="deleteBtn butn butn-md butn-danger butn-rounded">
                                            Kép törlése
                                        </button>
                                    @else
                                        <!-- Если фото нет, показываем стандартную форму загрузки -->
                                        <div class="icon">
                                            <i class="fas fa-images"></i>
                                        </div>
                                        <span class="header">Húzza ide a fényképet</span>
                                        <span class="header">vagy nyissa meg a </span>
                                        <div class="text-center mb-10 mt-10">
                                            <span class="button butn butn-md butn-bord butn-rounded">böngészőben</span>
                                        </div>
                                        <span class="support">Fényképformátum: JPEG, JPG, PNG</span>
                                    @endif
                                    <input name="photo" type="file" hidden />

                                </div>
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
                                <textarea name="biography"  class="form-control bg-dark text-white border-secondary" id="biography" rows="12">{{ old('biography', $memorial->biography) }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>



        <div class="container">
            <div class="row d-flex justify-content-center">


                <div class="col-12 col-md-3 p-4 mt-50">
                    <h3>Permalink</h3>
                    <p class="mt-2">Permalink egyedi URL</p>
                </div>

                <div class="col-12 col-md-7 p-3">
                    <div class="container">
                        <div class="row">
                            <div class="mt-50">
                                <label for="biography" class="form-label text-white">Permalink egyedi URL</label>
                                <input type="text" name="slug" id="slug" class="form-control bg-dark text-white border-secondary py-2" value="{{ $memorial->slug }}">
                                <small class="text-muted">Az azonosító használatához hagyja üresen</small>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>



        {{-- <input name="token" value="{{ $token }}" hidden> --}}

    <div class="text-center mb-70 mt-40">
        <button type="submit" class="butn butn-md butn-bord butn-rounded" id="submitBtn">
            <div class="d-flex align-items-center">
                <span id="btnText">Módosítások mentése</span>
                <span class="icon pe-7s-angle-right ml-10 fz-30" id="btnIcon"></span>
                <span class="spinner-border spinner-border-sm ml-10 d-none" id="btnSpinner"></span>
            </div>
        </button>
    </div>

    </form>

    </html>


@endsection

@section('js')
<script>
    const dropArea = document.querySelector('.drag-area');
    const dragText = document.querySelector('.header');
    let button = dropArea.querySelector('.button');
    let input = dropArea.querySelector('input');
    let file;

    // Функция инициализации всех обработчиков событий
    function initializeEventListeners() {
        button = dropArea.querySelector('.button');
        input = dropArea.querySelector('input');

        // Если кнопка загрузки существует, назначаем обработчик
        if (button) {
            button.onclick = () => {
                input.click();
            };
        }

        // Обработчик для выбора файла
        input.addEventListener('change', function() {
            file = this.files[0];
            dropArea.classList.add('active');
            displayFile();
        });

        // Обработчики для drag-and-drop
        dropArea.addEventListener('dragover', (event) => {
            event.preventDefault();
            dropArea.classList.add('active');
            dragText.textContent = 'Release to Upload';
        });

        dropArea.addEventListener('dragleave', () => {
            dropArea.classList.remove('active');
            dragText.textContent = 'Drag & Drop';
        });

        dropArea.addEventListener('drop', (event) => {
            event.preventDefault();
            file = event.dataTransfer.files[0];
            displayFile();
        });

        // Обработчик для кнопки удаления фото
        const deleteBtn = dropArea.querySelector('.deleteBtn');
        if (deleteBtn) {
            deleteBtn.addEventListener('click', () => {
                resetDropArea();
            });
        }
    }

    // Инициализируем обработчики при загрузке страницы
    initializeEventListeners();

    // Функция для отображения загруженного файла
    function displayFile() {
        let fileType = file.type;
        let validExtensions = ['image/jpeg', 'image/jpg', 'image/png'];

        if (validExtensions.includes(fileType)) {
            let fileReader = new FileReader();

            fileReader.onload = () => {
                let fileURL = fileReader.result;
                dropArea.innerHTML = `
                    <img src="${fileURL}" alt="">
                    <button type="button" class="deleteBtn butn butn-md butn-danger butn-rounded">
                        Kép törlése
                    </button>
                    <span class="button"></span>
                    <input name="photo" type="file" hidden />
                `;

                // Переназначаем элементы
                button = dropArea.querySelector('.button');
                input = dropArea.querySelector('input');

                // Обработчик для кнопки удаления
                const deleteBtn = dropArea.querySelector('.deleteBtn');
                deleteBtn.addEventListener('click', () => {
                    resetDropArea();
                });

                // Восстанавливаем обработчик для кнопки выбора файла
                button.onclick = () => {
                    input.click();
                };

                // Устанавливаем файл в input
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);
                input.files = dataTransfer.files;
            };
            fileReader.readAsDataURL(file);
        } else {
            alert('This is not an Image File');
            dropArea.classList.remove('active');
        }
    }

    // Функция для сброса dropArea
    function resetDropArea() {
        dropArea.innerHTML = `
            <div class="icon">
                <i class="fas fa-images"></i>
            </div>
            <span class="header">Húzza ide a fényképet</span>
            <span class="header">vagy nyissa meg a </span>
            <div class="text-center mb-10 mt-10">
                <span class="button butn butn-md butn-bord butn-rounded">böngészőben</span>
            </div>
            <input name="photo" type="file" hidden/>
            <span class="support">Fényképformátum: JPEG, JPG, PNG</span>
        `;

        // Переназначаем элементы после сброса
        button = dropArea.querySelector('.button');
        input = dropArea.querySelector('input');

        // Восстанавливаем обработчик клика для кнопки выбора файла
        button.onclick = () => {
            input.click();
        };

        // Удаляем класс active
        dropArea.classList.remove('active');

        // Заново инициализируем все обработчики событий
        initializeEventListeners();
    }
</script>

@endsection
