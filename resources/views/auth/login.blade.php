@extends('layouts.home')
@section('css')

@endsection

@section('title', 'Bejelentkezés - mbook.hu')

@section('content')

    <section class="vh-100 mt-30">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block fit-img img" style="padding-left:0px !important">
                                <img src="{{ asset('assets/imgs/works/6.png') }}" alt="login form" class="img-fluid"
                                    style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5">

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            {{-- <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i> --}}
                                            {{-- <span class="h1 fw-bold mb-0">Logo</span> --}}
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Jelentkezzen be fiókjába
                                        </h5>

                                        <div class="form-outline mb-4">
                                            <input name="email" placeholder="E-mail" type="email" id="form2Example17"
                                                class="form-control form-control-lg bg-dark text-white" />
                                            {{-- <label class="form-label" for="form2Example17">Email address</label> --}}
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input name="password" placeholder="Jelszó" type="password" id="form2Example27"
                                                class="form-control form-control-lg bg-dark text-white" />
                                            {{-- <label class="form-label" for="form2Example27">Password</label> --}}
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button type="submit" class="btn btn-light btn-lg btn-block" type="button">Bejelentkezés</button>
                                        </div>

                                        <a class="small text-light" href="{{ route('password.request') }}">Elfelejtetted a jelszavad?</a>
                                        <p class="mb-5 pb-lg-2 text-white-50 mt-10">Nincs fiókod? 
                                            <a href="{{ route('register') }}" class="text-white-50">Regisztrálj itt</a></p>
                                    </form>

                                    <hr class="my-4">

                                    <a data-mdb-button-init data-mdb-ripple-init
                                        href="{{ route('google.login') }}"
                                        class="btn btn-lg btn-block btn-primary mt-5"
                                        style="background-color: #dd4b39; border-color: #dd4b39;" type="submit"><i
                                            class="fab fa-google me-2"></i> Jelentkezzen be google -al</a>
                                    <button data-mdb-button-init data-mdb-ripple-init
                                        class="btn btn-lg btn-block btn-primary mb-2 mt-20"
                                        style="background-color: #3b5998; border-color: #3b5998;" type="submit"><i
                                            class="fab fa-facebook-f me-2"></i>Jelentkezzen be facebook -al</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection


