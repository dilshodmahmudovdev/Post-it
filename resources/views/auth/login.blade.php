@extends('layouts.auth')
@section('title', 'Tizimga kirish')
@section('content')
    <div class="container vh-100">
        <div class="row justify-content-center vh-100 align-items-center">
            <div class="col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="mb-5 px-4 py-4 pb-5 rounded-4 shadow bg-white">

                    <div class="fs-4 fw-semibold text-center">
                        Tizimga kirish
                    </div>

                    <div class="border-line mt-1 mx-2"></div>

                    <form action="{{ route('login.posts') }}" method="POST">
                        @csrf

                        <label for="email" class="auth-label">Email</label>
                        <input
                            type="email"
                            name="email"
                            placeholder="email_nomi@email.com"
                            value="{{ old('email') }}"
                            id="email"
                            class="auth-input"
                        >

                        @error('email')
                        <div class="alert alert-danger p-2 mt-2 error-text">
                            {{ $message }}
                        </div>
                        @enderror

                        <label for="password" class="auth-label">Parol</label>
                        <input
                            type="password"
                            name="password"
                            placeholder="Parol kiriting ****"
                            id="password"
                            class="auth-input"
                        >

                        @error('password')
                        <div class="alert alert-danger p-2 mt-2 error-text">
                            {{ $message }}
                        </div>
                        @enderror

                        <button class="auth-btn mt-3">Tizimga kirish</button>
                        <div class="border-line my-3 mx-2"></div>
                        <div class="text-center text-secondary small-text">Agar ro'yxatdan o'tmagan bo'lsangiz ro'yhatdan o'ting!</div>
                        <div class="text-center">
                            <a href="{{ route('register') }}" class="d-inline-block mt-1">Ro`yxatdan o'tish</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
