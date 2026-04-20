@extends('layouts.app')
@section('title','Home')
@section('content')
    <div class="row justify-content-center">
        <div>
            @foreach($posts as $post)
                <x-card :post="$post"/>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
