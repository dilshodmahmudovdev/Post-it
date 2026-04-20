<nav class="my-shadow my-nav">
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="col-xl-8">
                <div class="d-flex justify-content-between">
                    <div class="logo">
                        <img src="{{asset('images/post-it.png')}}" alt="">
                    </div>

                    @if(Auth::check())
                        <div class="dropdown nav-dropdown mt-3">
                            <button class="border rounded-5 p-1 bg-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <img src="https://thumbs.dreamstime.com/b/your-profile-text-office-desk-computer-technology-high-note-pad-electronic-devices-paper-wood-table-above-85616599.jpg" alt="" class="account-image">
                                    <small class="account-name">{{ Auth::user()->email }}</small>
                                </div>
                            </button>
                            <ul class="dropdown-menu my-shadow p-0">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="text-danger bg-white py-1 rounded-2 border-0 w-100">Chiqib ketish <i class="bi bi-box-arrow-right"></i></button>
                                </form>
                            </ul>
                        </div>
                    @else
                        <div class="d-flex align-items-center">
                            <a href="{{ route('login') }}" class="login-btn">Kirish <i class="bi bi-box-arrow-in-right"></i></a>
                            <a href="{{ route('register') }}" class="register-btn">Ro'yxatdan o'tish</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</nav>
