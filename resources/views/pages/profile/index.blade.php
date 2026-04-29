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

    <div class="avatar-out d-flex justify-content-end">
        @if($user->profile_photo_path)
            <a href="{{ asset('storage/' . $user->profile_photo_path) }}" target="_blank" class="avatar d-flex align-items-center justify-content-center">
                <img src="{{ asset('storage/' . $user->profile_photo_path) }}" alt="Profil rasmi">
            </a>
        @else
            <div class="avatar border-secondary d-flex align-items-center justify-content-center">
                <i class="bi bi-person-fill"></i>
            </div>
        @endif
    </div>

    <div class="profile-data px-3">
        <h5 class="full-name">
            {{ $user->full_name }}
        </h5>

        <p class="email">
            {{ $user->email }}
        </p>

        @if($user->bio)

            <div class="dropdown mb-3">
                <div class="description-btn" data-bs-toggle="dropdown" aria-expanded="false">
                    Bio<i class="bi bi-chevron-right"></i>
                </div>
                <div class="dropdown-menu bg-light bg-white shadow p-2 w-50">
                    <small>
                        {{ $user->bio }}
                    </small>
                </div>
            </div>
        @endif

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
        <div class="d-flex justify-content-center mt-3">
            {{$posts->links()}}
        </div>
    </div>

</div>

@endsection
