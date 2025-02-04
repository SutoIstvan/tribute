<x-app-layout>



    <div class="container">
        <div class="bg-dark text-secondary px-4 py-5 text-center">



            <div class="py-5">
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('img/avatar.png') }}" width="150" class="rounded-circle">
                </div>
                <h1 class="display-5 fw-bold text-white mt-4">Kovács Bence</h1>
                <div class="col-lg-6 mx-auto">
                    <p class="fs-5 mt-4 mb-4">
                        Nagy László 1952-ben született Debrecenben. Gyermekkora óta érdeklődött a műszaki tudományok
                        iránt, ezért tanulmányait a Budapesti Műszaki Egyetemen folytatta, ahol gépészmérnöki diplomát
                        szerzett...
                    </p>
                    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                        <button type="button" class="btn btn btn-outline-primary px-4 me-sm-3 fw-bold">Oldal
                            megnyitása</button>
                        <button type="button" class="btn btn-outline-light  px-4">Szerkesztés</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row d-flex justify-content-center">


            <div class="col-12 col-md-3 p-4">
                <h3>Elhunyt adatai</h3>
                <p class="mt-2">általában a következő információkat szokás feltüntetni.</p>
            </div>

            <div class="col-12 col-md-7 p-3">
                <div class="container">
                    <div class="row">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Teljes név</label>
                            <input type="name" class="form-control text-bg-dark rounded"
                                id="exampleFormControlInput1" placeholder="Teljes név">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Születési dátum</label>
                            <input type="name" class="form-control text-bg-dark rounded"
                                id="exampleFormControlInput1" placeholder="00.00.0000">
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Elhalálozás dátuma</label>
                            <input type="name" class="form-control text-bg-dark rounded"
                                id="exampleFormControlInput1" placeholder="00.00.0000">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Emlékezés, tiszteletadás</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>



    <div class="container">
        <div class="row d-flex justify-content-center mt-4">
            <div class="col-12 col-md-3 p-4">
                <h3>Életrajz</h3>
                <p class="mt-2">általában a következő információkat szokás feltüntetni.</p>
            </div>

            <div class="col-12 col-md-7 p-3">
                <div class="container ">
                    <div class="card border-warning">
                        <div class="mt-4 px-4">
                            <label for="exampleFormControlTextarea1" class="form-label">Életrajz</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class=" p-4">
                            <label for="exampleFormControlTextarea1" class="form-label">Fontosabb életesemények</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container pt-4">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <p class="col-md-4 mb-0 text-body-secondary">© 2024 Tribute hub</p>

            <a href="/"
                class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <img src="{{ asset('scan-qr-code.png') }}" width="23" alt="">
            </a>

            <ul class="nav col-md-4 justify-content-end">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Fotóalbum</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Videó</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Segítség</a></li>
            </ul>

        </footer>
    </div>

    </html>

</x-app-layout>
