<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class="conteriner">
        <div class="row">
            <section class="pb-4">
                <div class="border rounded-5">

                    <section class="w-100 p-4 pb-4">

                        <div class="row gx-lg-5">

                            <div class="col-lg-6 mb-5 mb-lg-0">

                                <div class="mb-4">
                                    <div class="card" data-mdb-theme="light">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <button type="button" class="btn btn-primary" data-mdb-ripple-init="">Button</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <!-- Navbar -->
                                    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary" data-mdb-theme="light">
                                        <!-- Container wrapper -->
                                        <div class="container-fluid">
                                            <!-- Toggle button -->
                                            <button data-mdb-collapse-init="" class="navbar-toggler collapsed" type="button" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                                <i class="fas fa-bars"></i>
                                            </button>

                                            <!-- Collapsible wrapper -->
                                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                                <!-- Navbar brand -->
                                                <a class="navbar-brand mt-2 mt-lg-0" href="#">
                                                    <img src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp" height="15" alt="MDB Logo" loading="lazy">
                                                </a>
                                                <!-- Left links -->
                                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#">Dashboard</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#">Team</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#">Projects</a>
                                                    </li>
                                                </ul>
                                                <!-- Left links -->
                                            </div>
                                            <!-- Collapsible wrapper -->

                                            <!-- Right elements -->
                                            <div class="d-flex align-items-center">
                                                <!-- Icon -->
                                                <a class="text-dark me-3" href="#">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </a>

                                                <!-- Notifications -->
                                                <div class="dropdown">
                                                    <a data-mdb-dropdown-init="" class="text-dark me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" aria-expanded="false" data-mdb-dropdown-initialized="true">
                                                        <i class="fas fa-bell"></i>
                                                        <span class="badge rounded-pill badge-notification bg-danger">1</span>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                                                        <li>
                                                            <a class="dropdown-item" href="#">Some news</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="#">Another news</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- Avatar -->
                                                <div class="dropdown">
                                                    <a data-mdb-dropdown-init="" class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" aria-expanded="false" data-mdb-dropdown-initialized="true">
                                                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle" height="25" alt="Black and White Portrait of a Man" loading="lazy">
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                                                        <li>
                                                            <a class="dropdown-item" href="#">My profile</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="#">Settings</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="#">Logout</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- Right elements -->
                                        </div>
                                        <!-- Container wrapper -->
                                    </nav>
                                    <!-- Navbar -->
                                </div>
                                <div class="mb-4">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-mdb-ripple-init="" data-mdb-modal-init="" data-mdb-target="#exampleModal">
                                        Launch demo modal
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-theme="light" data-mdb-modal-initialized="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header" data-mdb-theme="dark">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                    <button type="button" class="btn-close" data-mdb-ripple-init="" data-mdb-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">...</div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-mdb-ripple-init="" data-mdb-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary" data-mdb-ripple-init="">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-white p-2" data-mdb-theme="light">
                                    <div class="form-outline" data-mdb-datepicker-init="" data-mdb-input-init="" data-mdb-input-initialized="true" data-mdb-datepicker-initialized="true">
                                        <input type="text" class="form-control form-icon-trailing" id="exampleDatepicker11">
                                        <label for="exampleDatepicker11" class="form-label" style="margin-left: 0px;">Select a date</label>
                                        <div class="form-notch">
                                            <div class="form-notch-leading" style="width: 9px;"></div>
                                            <div class="form-notch-middle" style="width: 82.4px;"></div>
                                            <div class="form-notch-trailing"></div>
                                        </div>
                                        <button id="datepicker-toggle-116119" type="button" class="datepicker-toggle-button" data-mdb-toggle="datepicker">
                                            <i class="far fa-calendar datepicker-toggle-icon"></i>
                                        </button>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-6 mb-5 mb-lg-0">

                                <div class="mb-4">
                                    <div class="card" data-mdb-theme="dark">
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                            <button type="button" class="btn btn-primary" data-mdb-ripple-init="">Button</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <!-- Navbar -->
                                    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary" data-mdb-theme="dark">
                                        <!-- Container wrapper -->
                                        <div class="container-fluid">
                                            <!-- Toggle button -->
                                            <button data-mdb-collapse-init="" class="navbar-toggler collapsed" type="button" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                                <i class="fas fa-bars"></i>
                                            </button>

                                            <!-- Collapsible wrapper -->
                                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                                <!-- Navbar brand -->
                                                <a class="navbar-brand mt-2 mt-lg-0" href="#">
                                                    <img src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp" height="15" alt="MDB Logo" loading="lazy">
                                                </a>
                                                <!-- Left links -->
                                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#">Dashboard</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#">Team</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#">Projects</a>
                                                    </li>
                                                </ul>
                                                <!-- Left links -->
                                            </div>
                                            <!-- Collapsible wrapper -->

                                            <!-- Right elements -->
                                            <div class="d-flex align-items-center">
                                                <!-- Icon -->
                                                <a class="text-white me-3" href="#">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </a>

                                                <!-- Notifications -->
                                                <div class="dropdown">
                                                    <a data-mdb-dropdown-init="" class="text-white me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" aria-expanded="false" data-mdb-dropdown-initialized="true">
                                                        <i class="fas fa-bell"></i>
                                                        <span class="badge rounded-pill badge-notification bg-danger">1</span>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                                                        <li>
                                                            <a class="dropdown-item" href="#">Some news</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="#">Another news</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- Avatar -->
                                                <div class="dropdown">
                                                    <a data-mdb-dropdown-init="" class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" aria-expanded="false" data-mdb-dropdown-initialized="true">
                                                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle" height="25" alt="Black and White Portrait of a Man" loading="lazy">
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                                                        <li>
                                                            <a class="dropdown-item" href="#">My profile</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="#">Settings</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="#">Logout</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- Right elements -->
                                        </div>
                                        <!-- Container wrapper -->
                                    </nav>
                                    <!-- Navbar -->
                                </div>
                                <div class="mb-4">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-mdb-ripple-init="" data-mdb-modal-init="" data-mdb-target="#exampleModalDark" style="">
                                        Launch demo modal
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalDark" tabindex="-1" aria-labelledby="exampleModalLabelDark" data-mdb-theme="dark" data-mdb-modal-initialized="true" style="display: none;" data-gtm-vis-first-on-screen2340190_1302="216827" data-gtm-vis-total-visible-time2340190_1302="100" data-gtm-vis-has-fired2340190_1302="1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabelDark">Modal title</h5>
                                                    <button type="button" class="btn-close" data-mdb-ripple-init="" data-mdb-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">...</div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-mdb-ripple-init="" data-mdb-dismiss="modal" style="">Close</button>
                                                    <button type="button" class="btn btn-primary" data-mdb-ripple-init="">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-2" style="background-color: #303030;" data-mdb-theme="dark">
                                    <div class="form-outline" data-mdb-datepicker-init="" data-mdb-input-init="" data-mdb-input-initialized="true" data-mdb-datepicker-initialized="true">
                                        <input type="text" class="form-control form-icon-trailing active" id="exampleDatepicker2">
                                        <label for="exampleDatepicker11" class="form-label" style="margin-left: 0px;">Select a date</label>
                                        <div class="form-notch">
                                            <div class="form-notch-leading" style="width: 9px;"></div>
                                            <div class="form-notch-middle" style="width: 81.6px;"></div>
                                            <div class="form-notch-trailing"></div>
                                        </div>
                                        <button id="datepicker-toggle-394173" type="button" class="datepicker-toggle-button" data-mdb-toggle="datepicker">
                                            <i class="far fa-calendar datepicker-toggle-icon"></i>
                                        </button>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </section>



                    <div class="p-4 text-center border-top mobile-hidden">
                        <a class="btn btn-link px-3" data-mdb-collapse-init="" href="#example-name" role="button" aria-expanded="true" aria-controls="example-name" data-ripple-color="hsl(0, 0%, 67%)">
                            <i class="fas fa-code me-md-2"></i>
                            <span class="d-none d-md-inline-block">
                                Show code
                            </span>
                        </a>


                        <a class="btn btn-link px-3 " data-ripple-color="hsl(0, 0%, 67%)">
                            <i class="fas fa-file-code me-md-2 pe-none"></i>
                            <span class="d-none d-md-inline-block export-to-snippet pe-none">
                                Edit in sandbox
                            </span>
                        </a>

                    </div>


                </div>
            </section>
        </div>
    </div>
</body>

</html>