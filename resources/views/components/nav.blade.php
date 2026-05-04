<nav class="my-shadow my-nav">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-8">
                <div class="d-flex justify-content-between w-100">
                    <div class="logo">
                        <img src="{{asset('images/post-it.png')}}" alt="">
                    </div>

                    <div class="d-flex align-items-start">
                        @if(Auth::check())
                            <div class="dropdown nav-dropdown mt-3 mx-2">
                                <button class="border rounded-5 p-1 bg-light bg-opacity-50" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        @if(auth()->user()->profile_photo_path)
                                            <img src="{{ asset('storage/'. auth()->user()->profile_photo_path) }}" alt="" class="account-image">
                                        @else
                                            <div class="account-icon">
                                                <i class="bi bi-person-fill"></i>
                                            </div>
                                        @endif
                                        <small class="account-name">{{ auth()->user()->email }}</small>
                                    </div>
                                </button>
                                <ul class="dropdown-menu my-shadow p-0">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="text-danger fw-semibold bg-white py-1 rounded-2 border-0 w-100">
                                            <small>Chiqib ketish</small>
                                            <i class="bi bi-box-arrow-right"></i>
                                        </button>
                                    </form>
                                </ul>
                            </div>
                        @else
                            <div class="d-flex align-items-center pt-2 mx-2 mt-2">
                                <a href="{{ route('login') }}" class="login-btn">Kirish <i class="bi bi-box-arrow-in-right"></i></a>
                                <a href="{{ route('register') }}" class="register-btn">Ro'yxatdan o'tish</a>
                            </div>
                        @endif

                        <button class="btn d-xl-none py-1 px-1 mt-2" id="sidebarToggle">
                            <i class="bi bi-list fs-3"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
