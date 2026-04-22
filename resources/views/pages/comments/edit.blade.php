@extends('layouts.app')
@section('title', 'Tahrirlash')
@section('content')
    <div class="rounded-3 bg-white p-2 border my-shadow">
        <form action="{{ route('comments.update', $comment->id) }}"
              method="POST"
              class="px-3 py-2 mb-2 mt-3"
        >
            @csrf
            @method('PUT')
            <label for="comment" class="fw-semibold">
                Izohni yangilash:
            </label>
            <div class="my-border-top mt-1"></div>


            <div class="d-flex gap-2 mt-3 align-items-end">
                        <textarea class="comment-input" name="body" rows="1"
                        >{{ $comment->body }}</textarea>
                <button class="send-btn d-flex gap-2">
                    Yangilash
                </button>
            </div>
            <div class="my-border-top mt-3"></div>
        </form>
    </div>
@endsection
