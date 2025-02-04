<x-app-layout>

    <form method="POST" action="{{ route('memorial.attach') }}" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">


        <div class="d-flex justify-content-center mt-5">
            <img src="{{ asset('img/avatar.png') }}" width="150" class="rounded-circle">
        </div>
        <div class="d-flex justify-content-center mt-2 mb-5">
            <input type="file" name="photo">
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
                                <input type="text" name="name" class="form-control text-bg-dark rounded"
                                    id="exampleFormControlInput1" placeholder="Teljes név" required>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Születési dátum</label>
                                <input type="date" name="birth_date" class="form-control text-bg-dark rounded"
                                    id="exampleFormControlInput1" required>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Elhalálozás dátuma</label>
                                <input type="date" name="death_date" class="form-control text-bg-dark rounded"
                                    id="exampleFormControlInput1" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Emlékezés,
                                    tiszteletadás</label>
                                <textarea name="story" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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
                                <textarea name="biography" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class=" p-4">
                                <label for="exampleFormControlTextarea1" class="form-label">Fontosabb életesemények</label>
                                <textarea name="history" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="d-flex justify-content-center mt-2 mb-5">
            <button class="btn btn-secondary" type="submit">Mentes</button>
        </div>


    </form>


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

</x-app-layout>
