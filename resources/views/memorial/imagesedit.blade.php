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
            background: rgba(255, 0, 0, 0.7);
            /* Полупрозрачный красный фон */
            color: white;
            border: none;
            padding: 5px 10px;
            font-size: 14px;
            border-radius: 50%;
            cursor: pointer;
            transition: background 0.3s;
        }

        .item .img {
            border-radius: 15px;
            height: 255px;
            overflow: hidden;
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
            height: auto;
        }


        .search-container {
            position: relative;
        }

        .search-input {

            padding-left: 44px;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            font-size: 16px;

        }

        .search-icon {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: #888;
        }
    </style>
@endsection

@section('title', 'Képek szerkesztése - mbook.hu')

@section('content')

    <div class="container">
        <div class="section-padding text-secondary text-center">

            <div class="">

                <h4>
                    <span class="sub-color inline">Képek szerkesztése</span>
                </h4>

                {{-- <h1 class="display-5 fw-bold text-white mt-15">{{ $memorial->name }}</h1> --}}
                <div class="col-lg-6 mx-auto">
                    <p class="fs-5 mt-4 mb-4">
                        Ezen az oldalon fényképeket tölthet fel, dátumot és megjegyzést fűzhet a fotóhoz. A mentéshez
                        kattintson a módosítások mentése gombra
                        az oldal alján.
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




    <div class="container">
        <div class="row d-flex justify-content-center">

            {{-- <form action="{{ route('memorial.images.upload', $memorial->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <input type="file" name="images[]" multiple>
                <button type="submit">Upload</button>
            </form> --}}

            <form action="{{ route('memorial.images.upload', $memorial->id) }}" method="POST" enctype="multipart/form-data"
                class="p-4 bg-dark rounded shadow mb-40" style="width: 500px;">
                @csrf
                <label for="images" class="form-label text-white">Képek feltöltése</label>
                <input type="file" name="images[]" multiple class="form-control bg-secondary text-white border-0">

                <button type="submit" class="btn btn-secondary mt-3 w-100">Feltöltés</button>
            </form>


            {{-- <h2>images list</h2> --}}


            @if (session('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>
            @endif


            <form action="{{ route('memorials.images.update', $memorial->id) }}" method="POST">
                @csrf
                <div class="container">
                    <div class="row xlg-marg mb-100">
                        @foreach ($memorial->memorialimages as $image)
                            <input type="hidden" name="images[{{ $loop->index }}][id]" value="{{ $image->id }}">
                            <div class="col-lg-4 bord mt-20">
                                <div class="item">
                                    <div class="info d-flex align-items-center"></div>
                                    <div class="img fit-img mt-30">
                                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="">
                                    </div>
                                    <div class="cont mt-30">
                                        {{-- <div class="date ml-auto d-flex align-items-center">
                                            <i class="fa-regular fa-clock mr-15 opacity-7"></i>
                                            <input name="images[{{ $loop->index }}][image_date]" type="text"
                                                value="{{ $image->image_date }}"
                                                class="form-control bg-dark text-white border-secondary py-2"
                                                placeholder="A fénykép dátuma">
                                        </div> --}}
                                        {{-- ------------------------------------------------------------------ --}}

                                        <div class="">
                                            <div class="search-container">
                                                <input name="images[{{ $loop->index }}][image_date]" type="text" class="w-100 bg-dark text-white border-secondary py-2 search-input"
                                                    placeholder="A fénykép dátuma"
                                                    value="{{ $image->image_date }}">
                                                <i class="fa-regular fa-clock search-icon"></i>
                                            </div>
                                        </div>

                                        <h6 class="mt-3">
                                            <input name="images[{{ $loop->index }}][image_description]" type="text"
                                                value="{{ $image->image_description }}"
                                                class="form-control bg-dark text-white border-secondary py-2"
                                                placeholder="A fénykép leírása">
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @if ($memorial->memorialimages->isNotEmpty())
                    <div class="text-center mb-80">
                        <button type="submit" class="butn butn-md butn-bord butn-rounded">Módosítások mentése</button>
                    </div>
                @endif
                


            </form>



        </div>
    </div>



    </form>

    </html>


@endsection

@section('js')
    {{-- <script>
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
</script> --}}

@endsection
