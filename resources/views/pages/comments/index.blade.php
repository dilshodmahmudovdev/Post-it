@extends('layouts.app')
@section('title', 'Izohlar')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="border rounded-3 py-3 px-3 my-shadow bg-white">

                <div class="my-border-top"></div>

                <div class="d-flex gap-2 mt-3">
                    <div class="comments-image">
                        <img src="{{ asset('storage/'. $post->img_url) }}" alt="">
                    </div>
                    <div class="w-50 comment-text">
                        <h6 class="hidden-title">{{ $post->title }}</h6>
                        <div class="my-border-top"></div>
                        <p class="hidden-body">{{ $post->body }}</p>
                    </div>
                </div>

                <form action="{{ route('comments.store', $post) }}"
                      method="POST"
                      class="px-3 py-2 bg-light rounded-2 mb-2 mt-3 my-border"
                >
                    @csrf
                    <label for="comment">
                        Izoh yozish:
                    </label>

                    @error('body')
                    <div class="alert alert-danger p-2 mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                    <input type="text" class="comment-input mt-2" name="body" value="{{ old('body') }}">

                    <div class="text-end mt-1">
                        <button class="send-btn">
                            Yuborish <i class="bi bi-send-fill"></i>
                        </button>
                    </div>
                </form>

                @if($post->comments->count() > 0)
                    <div class="comments mt-3">
                        <h5 class="text-center mb-3">Post Izohlari</h5>
                        @foreach($post->comments as $comment)
                            <div class="comment border-top">
                                <div class="comment-profile">
                                    <i class="bi bi-person-circle"></i>
                                    <a href="{{ route('profiles', $comment->user->id) }}" class="comment-link">{{ $comment->user->email }}</a>
                                    <x-timeAgo :timestamp="$comment->time_ago"/>
                                </div>
                                <p class="comment-body">{{ $comment->body }}</p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <h5 class="pt-1 my-border-top mt-2 text-center">
                        Hozircha izohlar yo'q
                    </h5>
                    <div class="my-border-top"></div>
                @endif

            </div>
        </div>
    </div>

@endsection
