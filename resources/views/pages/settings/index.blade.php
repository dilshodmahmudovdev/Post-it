@extends('layouts.app')
@section('title', 'Sozlamalar')
@section('content')
    <div class="bg-white border my-shadow p-3 rounded-3">
        <h5>Profil Sozlamalari</h5>
        <form action="">
            <label for="">Profil rasmi</label>
            <input type="file" class="comment-input mb-2">
            <label for="">Profil-muqova rasmi</label>
            <input type="file" class="comment-input mb-2">
            <label for="">Bio</label>
            <input type="text" class="comment-input mb-2" placeholder="Bio">
            <button class="btn btn-primary">Yangilash</button>
        </form>
    </div>

@endsection
