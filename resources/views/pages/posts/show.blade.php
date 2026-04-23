@extends('layouts.app')
@section('title', 'Post')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="my-shadow rounded-3 bg-white py-2 px-3 mb-5">
                <div class="d-flex justify-content-end mt-0 gap-1 mb-1 pt-2">
                    <div class="d-flex align-items-center">
                        <form action="{{ route('posts.like', $post) }}" method="POST" class="d-inline-block">
                            @csrf
                            <button type="submit" class="like-btn">
                                <i class="bi bi-heart"></i>
                                <small class="mx-1">
                                    @if(!$post->likes || $post->likes->count() === 0)
                                        ...
                                    @else
                                        {{ $post->likes->count() }}
                                    @endif
                                </small>
                            </button>
                        </form>

                        <a href="{{ route('posts.comments.index', $post) }}" target="_blank" class="comments-btn">
                            <i class="bi bi-chat"></i>
                            <small class="mx-1">
                                @if(!$post->comments || count($post->comments) === 0)
                                    ...
                                @else
                                    {{ count($post->comments) }}
                                @endif
                            </small>
                        </a>
                    </div>

                    @if($auth_id === $post->user_id )

                        <div class="dropdown">
                            <button class="btn btn-light border text-danger border-secondary btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-trash3-fill"></i>
                            </button>
                            <ul class="dropdown-menu p-1">
                                <li>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline-block w-100 mb-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-center d-block dropdown-item bg-success text-white rounded-2">
                                            O'chirish <i class="bi bi-check-lg"></i>
                                        </button>
                                    </form>

                                </li>
                                <li>
                                    <button class="text-center d-block dropdown-item bg-danger text-white btn-sm rounded-2" data-bs-toggle="dropdown">
                                        Bekor qilish <i class="bi bi-x-lg"></i>
                                    </button>
                                </li>
                            </ul>
                        </div>

                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-light border text-dark border-secondary btn-sm mt-0"><i class="bi bi-pencil"></i></a>
                    @endif
                </div>

                <div class="my-border-top mt-2 mb-3"></div>

                <a href="{{ asset('storage/' . $post->img_url) }}" target="_blank" class="card-image-on">
                    <img src="{{ asset('storage/' . $post->img_url) }}" alt="">
                </a>

                <div class="my-border-top mt-3 mb-2"></div>
                <h5>
                    {{ $post->title }}
                </h5>
                <div class="my-border-top mt-3 mb-2"></div>
                <p class="px-2 py-1 bg-secondary bg-opacity-10 rounded-2">
                    {{$post->body}}
                </p>

            </div>
        </div>
    </div>
{{--<h4>Bu <span class="text-warning">show.blade.php</span> {{ $post }}</h4>--}}
@endsection
