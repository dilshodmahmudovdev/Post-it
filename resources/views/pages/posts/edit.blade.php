@extends('layouts.app')
@section('title', 'Tahrirlash')
@section('content')
    <div class="px-1">
        <form
            action="{{ route('posts.update', $post->id) }}"
            method="POST" enctype="multipart/form-data"
            class="p-3 border rounded-3 my-shadow bg-white"
        >
            @csrf
            @method('PUT')

            <h3 class="mt-0">Postni tahrirlash.</h3>
            <div class="my-border-top"></div>

            <a href="{{ asset('storage/' . $post->img_url) }}" target="_blank" class="edit-img-on">
                <img src="{{ asset('storage/' . $post->img_url) }}" alt="" class="edit-img">
            </a>

            <div class="my-border-top mb-3"></div>

            <label for="image" class="my-2 fw-semibold">
                Rasm yuklash:
            </label>

            <input type="file" name="image" id="image" class="comment-input">

            @error('image')
            <div class="alert alert-danger p-2 mt-1">
                {{ $message }}
            </div>
            @enderror

            <label for="title" class="my-2 fw-semibold">
                Post mavzusi
            </label>
            <input
                id="title"
                type="text"
                name="title"
                placeholder="Mavzu..."
                value="{{ $post->title }}"
                class="comment-input"
            >

            @error('title')
            <div class="alert alert-danger p-2 mt-1">
                {{ $message }}
            </div>
            @enderror

            <label for="body" class="mt-3 mb-2 fw-semibold">
                Post matni
            </label>
            <textarea
                name="body"
                id="body"
                rows="4"
                class="comment-input"
                placeholder="Matin..."
            >{{ $post->body }}</textarea>

            @error('body')
            <div class="alert alert-danger p-2 mt-1">
                {{ $message }}
            </div>
            @enderror

            <div class="text-end mt-2">
                <a href="{{ url()->previous() }}" class="btn btn-outline-danger mx-2">Bekor qilsih <i class="bi bi-x-lg"></i></a>
                <button class="btn btn-primary">
                    Postni yangilash <i class="bi bi-check-square"></i>
                </button>
            </div>
        </form>
    </div>
@endsection
