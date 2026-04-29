@extends('layouts.app')
@section('title', 'Tahrirlash')
@section('content')
    <div class="rounded-3 bg-white p-2 border my-shadow">
        <form action="{{ route('comments.update', $comment) }}"
              method="POST"
              class="px-3 py-2 mb-2 mt-3"
        >
            @csrf
            @method('PUT')
            <h4>
                Izohni yangilash
            </h4>
            <div class="my-border-top mb-3"></div>


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
