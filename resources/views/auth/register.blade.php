@extends('layouts.auth')
@section('title', 'Ro`yxatdan o`tish')
@section('content')
    <div class="container vh-100">
        <div class="row justify-content-center vh-100 align-items-center">
            <div class="col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="mb-5 px-4 py-4 pb-5 rounded-4 shadow bg-white">

                    <div class="fs-4 fw-semibold text-center">
                        Ro`yxatdan o`tish
                    </div>

                    <div class="border-line mt-1 mx-2"></div>

                    <form action="{{ route('register.posts') }}" method="POST">
                        @csrf
                        <label for="full_name" class="auth-label">To'liq Ismingiz</label>
                        <input
                            type="text"
                            name="full_name"
                            placeholder="To'liq ism-familiyaniz"
                            value="{{ old('full_name') }}"
                            id="full_name"
                            class="auth-input"
                        >

                        @error('full_name')
                        <div class="alert alert-danger mt-2 p-2 error-text">
                            {{ $message }}
                        </div>
                        @enderror

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
                        <div class="alert alert-danger mt-2 p-2 error-text">
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
                        <ul class="alert alert-danger mt-2 p-2 error-text">
                            {{ $message }}
                        </ul>
                        @enderror

                        <label for="confirm_pass" class="auth-label">Parolni tasdiqlash</label>
                        <input
                            type="password"
                            name="password_confirmation"
                            placeholder="Paroln qayta kiriting ****"
                            id="confirm_pass"
                            class="auth-input"
                        >
                        <button class="auth-btn mt-3">Ro'yxatdan o'tish</button>
                        <div class="border-line my-3 mx-2"></div>
                        <div class="text-center text-secondary small-text">Agar ro'yxatdan o'tgan bo'lsangiz shunchaki tizmga kiring!</div>
                        <div class="text-center">
                            <a href="{{ route('login') }}" class="d-inline-block mt-1">Tizimga kirish</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
