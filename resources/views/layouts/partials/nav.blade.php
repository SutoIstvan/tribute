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
                    <a class="nav-link {{ request()->routeIs('welcome') ? 'active' : '' }}" href="{{ route('welcome') }}">Címlap</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('memorial.codelist') ? 'active' : '' }}" href="{{ route('memorial.codelist') }}">Qr code list</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('price') ? 'active' : '' }}" href="{{ route('price') }}">Árak</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Kapcsolatok</a>
                </li>
                <li class="nav-item">
                    @auth
                        <a class="nav-link" href="{{ route('dashboard') }}">Irányítópult</a>
                    @else
                        <a class="nav-link" href="{{ route('login') }}">Belépés</a>
                    @endauth
                </li>
                
                {{-- <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-link"  style="background-color: #0e0f11; border: none;">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </li> --}}
            </ul>
        </div>
        <div class="menu-icon cursor-pointer d-lg-none">
            <div class="menu-icon cursor-pointer d-md-none">
                <span class="icon ti-align-right"></span>
            </div>
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
                        <a href="#" class="link"><span class="fill-text"
                                data-text="Címlap">Címlap</span></a>
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
                        <a href="#" class="link"><span class="fill-text"
                                data-text="Videó">Videó</span></a>
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