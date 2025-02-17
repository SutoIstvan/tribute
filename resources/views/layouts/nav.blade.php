<nav class="navbar navbar-expand-lg">
    <div class="container">

        <!-- Logo -->
        <a class="logo" href="#">
            <img src="{{ asset('assets/imgs/logo-mbook.png') }}" alt="logo" style="height: 18px;">
            
            <!-- Tribute Hub -->
            <!-- <img src="assets/imgs/Logo-light.svg" alt="logo"> -->
        </a>

        <!-- navbar links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left: 300px;">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Címlap</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Életrajz</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Fényképek</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Videó</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Hozzászólások</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('profile.edit') }}" class="nav-link">
                        {{ __('Profile') }}
                    </a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-link"  style="background-color: #0e0f11; border: none;">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </li>
            </ul>
        </div>
        <div class="topnav d-flex align-items-center">
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
                <!-- <li>
                    <div class="o-hidden">
                        <div class="link cursor-pointer dmenu"><span class="fill-text" data-text="Home">Home</span>
                            <i></i>
                        </div>
                    </div>
                    <div class="sub-menu">
                        <ul>
                            <li>
                                <a href="../startup_agency/index.html" class="sub-link">Startup Agency</a>
                            </li>
                            <li>
                                <a href="../creative-studio/index.html" class="sub-link">Creative Studio</a>
                            </li>
                            <li>
                                <a href="../creative_agency/index.html" class="sub-link">Creative Agency</a>
                            </li>
                            <li>
                                <a href="../digital-marketing/index.html" class="sub-link">Digital Marketing</a>
                            </li>
                            <li>
                                <a href="../modern_portfolio/index.html" class="sub-link">Modern Portfolio</a>
                            </li>
                            <li>
                                <a href="../digital_studio/index.html" class="sub-link">Digital Studio</a>
                            </li>
                            <li>
                                <a href="../modern_agency/index.html" class="sub-link">Modern Agency</a>
                            </li>
                            <li>
                                <a href="../creative_agency2/index.html" class="sub-link">Creative Agency 2</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="o-hidden">
                        <div class="link cursor-pointer dmenu"><span class="fill-text"
                                data-text="Pages">Pages</span>
                            <i></i>
                        </div>
                    </div>
                    <div class="sub-menu">
                        <ul>
                            <li>
                                <a href="../inner_pages/about.html" class="sub-link">About Us</a>
                            </li>
                            <li>
                                <a href="../inner_pages/services.html" class="sub-link">Our Services</a>
                            </li>
                            <li>
                                <a href="../inner_pages/service-details.html" class="sub-link">Services Details</a>
                            </li>
                            <li>
                                <a href="../inner_pages/team.html" class="sub-link">Our Team</a>
                            </li>
                            <li>
                                <a href="../inner_pages/pricing.html" class="sub-link">Pricing</a>
                            </li>
                            <li>
                                <a href="../inner_pages/faqs.html" class="sub-link">FAQS</a>
                            </li>
                            <li>
                                <a href="../inner_pages/contact.html" class="sub-link">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="o-hidden">
                        <div class="link cursor-pointer dmenu"><span class="fill-text"
                                data-text="Portfolio">Portfolio</span>
                            <i></i>
                        </div>
                    </div>
                    <div class="sub-menu">
                        <ul>
                            <li>
                                <a href="../inner_pages/portfolio-standard.html" class="sub-link">Standard</a>
                            </li>
                            <li>
                                <a href="../inner_pages/portfolio-gallery.html" class="sub-link">Gallery</a>
                            </li>
                            <li>
                                <a href="../inner_pages/portfolio-cards.html" class="sub-link">Card</a>
                            </li>
                            <li>
                                <a href="../inner_pages/portfolio-layout2.html" class="sub-link">Grid 2 Column</a>
                            </li>
                            <li>
                                <a href="../inner_pages/portfolio-layout3.html" class="sub-link">Gid 3 Column</a>
                            </li>
                            <li>
                                <a href="../inner_pages/portfolio-layout4.html" class="sub-link">Grid 4 Column</a>
                            </li>
                            <li>
                                <a href="../inner_pages/project-details.html" class="sub-link">Project Details</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="o-hidden">
                        <div class="link cursor-pointer dmenu"><span class="fill-text" data-text="Blog">Blog</span>
                            <i></i>
                        </div>
                    </div>
                    <div class="sub-menu">
                        <ul>
                            <li>
                                <a href="../inner_pages/blog-grid.html" class="sub-link">Blog Grid</a>
                            </li>
                            <li>
                                <a href="../inner_pages/blog-standard.html" class="sub-link">Blog Standard</a>
                            </li>
                            <li>
                                <a href="../inner_pages/blog-details.html" class="sub-link">Blog Details</a>
                            </li>
                        </ul>
                    </div>
                </li> -->
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