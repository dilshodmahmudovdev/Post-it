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
                    <div class="w-50 comment-text bg-light border">
                        <h6 class="hidden-title">{{ $post->title }}</h6>
                        <div class="my-border-top"></div>
                        <p class="hidden-body">{{ $post->body }}</p>
                    </div>
                </div>

                <form action="{{ route('posts.comments.store', $post) }}"
                      method="POST"
                      class="px-3 py-2 mb-2 mt-3"
                >
                    @csrf
                    <label for="comment" class="fw-semibold">
                        Izoh yozish:
                    </label>
                    <div class="my-border-top mt-1"></div>

                    @error('body')
                    <div class="alert alert-danger p-2 mt-2">
                        {{ $message }}
                    </div>
                    @enderror

                    <div class="d-flex gap-2 mt-3 align-items-end">
                        <textarea class="comment-input" name="body" rows="1"
                        >{{ old('body') }}</textarea>
                        <button class="send-btn d-flex gap-2">
                            Yuborish <i class="bi bi-send-fill"></i>
                        </button>
                    </div>
                    <div class="my-border-top mt-3"></div>
                </form>

                @if($post->comments->count() > 0)
                    <div class="comments mt-3">
                        <h5 class="text-center mb-3">Post Izohlari</h5>
                        @foreach($post->comments as $comment)
                            <div class="comment border-top">
                                <div class="d-flex justify-content-between">
                                    <div class="comment-profile">
                                        <i class="bi bi-person-circle"></i>
                                        <a href="{{ route('profiles', $comment->user_id) }}" class="comment-link">{{ $comment->user->email }}</a>
                                        <x-timeAgo :timestamp="$comment->time_ago"/>
                                    </div>

                                    @can('update', $comment)
                                        <div class="d-flex align-items-center gap-1">
                                            <a href="{{route('comments.edit', $comment)}}" class="d-inline-block text-dark px-1 border border-dark rounded-1">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('comments.destroy', $comment) }}" class="d-inline-block" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="d-inline-block text-dark px-1 border border-dark rounded-1 bg-transparent">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    @endcan
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
