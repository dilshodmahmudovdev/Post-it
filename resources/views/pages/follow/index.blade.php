@extends('layouts.app')
@section('title', 'Obunalar')

@section('content')
    <div class="bg-white rounded-3 p-3 border my-shadow">
        <h4>Obunalar</h4>
        <div class="my-border-top mb-3"></div>
        <table class="table table-hover align-middle">
            @forelse($followings as $following)
                <tr>
                    <td>
                        @if($following->profile_photo_path)
                            <div class="followings-table-photo">
                                <img src="{{ asset('storage/' . $following->profile_photo_path) }}" alt="{{ $following->email }}">
                            </div>
                        @else
                            <span class="followings-table-icon">
                                <i class="bi bi-person-circle"></i>
                            </span>
                        @endif
                    </td>

                    <td>
                        <p class="fw-semibold m-0">{{$following->full_name}}</p>
                        <small class="text-secondary m-0">{{$following->email}}</small>
                    </td>
                    <td>
                        <a href="{{ route('profiles', $following->id) }}" class="btn btn-light btn-sm">
                            Kirish
                        </a>
                    </td>
                </tr>
            @empty
                <p class="text-center text-secondary">Hozircha obuna bo'lishlar yo'q.</p>
            @endforelse
        </table>
        @isset($followings)
            <div class="d-flex justify-content-center">
                {{ $followings->links() }}
            </div>
        @endisset
    </div>
@endsection
