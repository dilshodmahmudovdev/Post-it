@extends('layouts.app')
@section('title', 'Profil')
@section('content')

<div class="profile-page bg-white my-shadow border mb-5">
    <div class="header">
        <img src="https://thumbs.dreamstime.com/b/your-profile-text-office-desk-computer-technology-high-note-pad-electronic-devices-paper-wood-table-above-85616599.jpg" alt="">
    </div>

    <div class="d-flex justify-content-end">
        <a href="#" class="avatar d-flex justify-content-center align-items-center">
        </a>
    </div>

    <div class="profile-data px-3">
        <h5 class="full-name">
            {{ $user->full_name }}
        </h5>

        <p class="email">
            {{ $user->email }}
        </p>

        <p class="description-btn">
            Boshqa ma'lumotlar <i class="bi bi-chevron-right"></i>
        </p>

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
                    <h5 class="mt-3 text-center">Sizda hali Postlar yo'q</h5>
                @endforelse
            </div>
        </div>
        <div class="d-flex justify-content-center mt-3">
            {{$posts->links()}}
        </div>
    </div>

</div>

@endsection
