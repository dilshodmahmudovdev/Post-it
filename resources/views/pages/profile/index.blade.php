@extends('layouts.app')
@section('title', 'Profil')
@section('content')

<div class="profile-page bg-white my-shadow border mb-5">
    @if($user->cover_photo_path)
        <a href="{{ asset('storage/' . $user->cover_photo_path) }}" target="_blank" class="header">
            <img src="{{ asset('storage/' . $user->cover_photo_path) }}" alt="Muqova rasmi">
        </a>
    @else
        <div class="header"></div>
    @endif


    <div class="profile-data px-3">
        <div class="avatar-out d-flex justify-content-end mb-3">
            @if($user->profile_photo_path)
                <a href="{{ asset('storage/' . $user->profile_photo_path) }}" target="_blank" class="avatar d-flex align-items-center justify-content-center">
                    <img src="{{ asset('storage/' . $user->profile_photo_path) }}" alt="Profil rasmi">
                </a>
            @else
                <div class="avatar border-secondary d-flex align-items-center justify-content-center">
                    <i class="bi bi-person-fill"></i>
                </div>
            @endif

                <div>
                    <h5 class="full-name">
                        {{ $user->full_name }}
                    </h5>

                    <p class="email">
                        {{ $user->email }}
                    </p>

                    @if($user->email)

                        <div class="dropdown">
                            <div class="description-btn" data-bs-toggle="dropdown" aria-expanded="false">
                                Profile data<i class="bi bi-chevron-right"></i>
                            </div>
                            <div class="dropdown-menu bg-light bg-white shadow p-2 w-50">
                                <div class="my-border-top"></div>
                                @isset($user->full_name)
                                    <small>
                                        <b>Ismi:</b>
                                        {{ $user->full_name }}
                                    </small>
                                    <div class="my-border-top"></div>
                                @endisset

                                @isset($user->email)
                                    <small>
                                        <b>Email:</b>
                                        {{ $user->email }}
                                    </small>
                                    <div class="my-border-top"></div>
                                @endisset

                                @isset($user->bio)
                                    <small>
                                        <b>Bio: </b>
                                        {{ $user->bio }}
                                    </small>
                                @endisset
                                <div class="my-border-top"></div>
                            </div>
                        </div>
                    @endif
                </div>
        </div>

        <div class="following-part">
            @auth
                @if($user->id !== auth()->id())
                    <form action="{{ route('profile.follow', $user)}}" method="POST">
                        @csrf
                        @if(auth()->user()->following->contains($user->id))
                            <button class="btn btn-secondary btn-sm follow-btn">
                                <small>Obunani bekor qilish <i class="bi bi-x-lg"></i></small>
                            </button>
                        @else
                            <button class="btn btn-dark btn-sm follow-btn">
                                <small>Obuna bo'lish +</small>
                            </button>
                        @endif
                    </form>
                @endif
            @endauth
        </div>

    </div>

    <div class="px-3 mb-0">
        <div class="my-border-top"></div>
        <div class="d-flex">
            <a href="#" class="content-link active">Postlar</a>
            <a href="#" class="content-link">Mediya</a>
        </div>
        <div class="my-border-top"></div>
    </div>

    <div class="px-2 mt-0">
        <div class="container-fluid">
            <div class="row">
                @forelse($posts as $post)
                    <x-profileCard :post="$post" :isOwner="true"/>
                @empty
                        <p class="mt-3 text-center fw-semibold text-muted">
                            ( Hozircha postlar mavjud emas. )
                        </p>
                @endforelse
            </div>
        </div>

        <div class="px-2">
            <div class="my-border-top my-3"></div>
        </div>

        <div class="d-flex justify-content-center">
            {{$posts->links()}}
        </div>
    </div>

</div>

@endsection
