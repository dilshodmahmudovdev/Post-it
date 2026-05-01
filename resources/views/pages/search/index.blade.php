@extends('layouts.app')
@section('title', 'Qidiruv')
@section('content')
<div class="bg-white rounded-3 p-3 border my-shadow">
    <h4>Qidiruv...</h4>
    <div class="my-border-top mb-2"></div>
    <form action="{{ route('search.results') }}" method="GET" class="d-flex gap-2">
        <input type="text" class="comment-input" name="search" placeholder="Qidiruv...">
        <button class="btn btn-primary btn-sm d-flex gap-1">
            <span>Qidirish</span><i class="bi bi-search"></i>
        </button>
    </form>
    <div class="my-border-top my-2"></div>

    @if(isset($users))

        <table class="table">
            @forelse($users as $user)
                <tr>
                    <td>
                        @if($user->profile_photo_path)
                            <div class="followings-table-photo">
                                <img src="{{ asset('storage/' . $user->profile_photo_path) }}" alt="{{ $user->email }}">
                            </div>
                        @else
                            <span class="followings-table-icon">
                                <i class="bi bi-person-circle"></i>
                            </span>
                        @endif
                    </td>

                    <td>
                        <p class="fw-semibold m-0">{{$user->full_name}}</p>
                        <small class="text-secondary m-0">{{$user->email}}</small>
                    </td>
                    <td>
                        <a href="{{ route('profiles', $user->id) }}" class="btn btn-light btn-sm">
                            Kirish
                        </a>
                    </td>
                </tr>
            @empty
                <p class="text-secondary text-center mb-0">Qidiruv bo'yicha natijalar yo'q.</p>
            @endforelse
        </table>
    @else
        <p class="text-secondary text-center mb-0">Hozircha natijalar yo'q.</p>
    @endif
</div>
@endsection
