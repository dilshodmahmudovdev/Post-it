<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/profiles/{user}', [ProfileController::class, 'show'])->name('profiles');
//Route::get('/profiles/{user}/media', [ProfileController::class, 'showMedia'])->name('profile.media');

/*
|--------------------------------------------------------------------------
| GUEST AUTH ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');

    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::post('/register', [AuthController::class, 'register'])->name('register.posts');
    Route::post('/login', [AuthController::class, 'login'])->name('login.posts');
});

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/media', [ProfileController::class, 'showMyMedia'])->name('profile.my.media');
    Route::post('/profiles/{user}', [ProfileController::class, 'follow'])->name('profile.follow');
    Route::get('/follow', [ProfileController::class, 'showFollowings'])->name('follow.show');

    Route::get('/notifications', function () {
        return view('pages.notifications.index');
    })->name('notifications');

    Route::get('/settings', function () {
        return view('pages.settings.index');
    })->name('settings');

    Route::resource('posts', PostController::class);

    Route::post('posts/{post}/like', [PostController::class, 'toggleLike'])
        ->name('posts.like');

    Route::resource('posts.comments', CommentController::class)->shallow();

    Route::patch('/settings', [ProfileController::class, 'update'])->name('profile.update');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
