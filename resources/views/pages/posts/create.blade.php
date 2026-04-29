@extends('layouts.app')
@section('title', 'Post yaratish')
@section('content')
    <div class="p-0">
        <form
            action="{{ route('posts.store') }}"
            method="POST" enctype="multipart/form-data"
            class="p-3 border rounded-3 my-shadow bg-white"
        >
            @csrf

            <h4 class="mt-0">Post yaratish.</h4>
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
                value="{{ old('title') }}"
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
            >{{ old('body') }}</textarea>

            @error('body')
            <div class="alert alert-danger p-2 mt-1">
                {{ $message }}
            </div>
            @enderror

            <button class="btn btn-primary mt-2">
                Postni joylash +
            </button>
        </form>
    </div>
@endsection
