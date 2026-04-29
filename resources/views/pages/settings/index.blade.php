@extends('layouts.app')

@section('title', 'Sozlamalar')

@section('content')
    <div class="bg-white border my-shadow p-3 rounded-3">
        <h4>Profil Sozlamalari</h4>
        <div class="my-border-top mb-3"></div>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <label for="profile" class="fw-semibold">Profil rasmi</label>
            <input type="file" name="profile_photo" id="profile" class="comment-input mb-3 mt-1">

            @error('profile_photo')
            <div class="alert alert-danger p-2 mt-1">{{ $message }}</div>
            @enderror


            <label for="cover" class="fw-semibold">Profil-muqova rasmi</label>
            <input type="file" name="cover_photo" id="cover" class="comment-input mb-3 mt-1">

            @error('cover_photo')
            <div class="alert alert-danger p-2 mt-1">{{ $message }}</div>
            @enderror


            <label for="bio" class="fw-semibold">Bio</label>
            <textarea
                name="bio"
                id="bio"
                rows="2"
                maxlength="99"
                class="comment-input my-1"
                placeholder="Bio"
            >{{ old('bio', auth()->user()->bio) }}</textarea>

            @error('bio')
            <div class="alert alert-danger p-2 mt-1">{{ $message }}</div>
            @enderror

            <div class="my-border-top"></div>
            <button class="btn btn-primary mt-2">Yangilash</button>
        </form>
    </div>
@endsection
