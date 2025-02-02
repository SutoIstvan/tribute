<header class="p-3 text-bg-dark">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <!-- Logo -->
            <div class="shrink-0 flex items-center me-3 ms-3">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                </a>
            </div>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{ route('dashboard') }}" class="nav-link px-2 activ">{{ __('Dashboard') }}</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Oldal szerkesztése</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Fotóalbum</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Videó</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Segítség</a></li>
            </ul>

            <div class="text-end">
                <button type="button" class="btn btn-outline-light me-2 btn-sm" onclick="window.location.href='{{ route('profile.edit') }}'">
                    {{ __('Profile') }}
                </button>
            </div>

            <div class="text-end">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="button" class="btn btn btn-outline-danger btn-sm" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>

        </div>
    </div>
</header>
