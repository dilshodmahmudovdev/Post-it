<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware(['auth'])->group(function () {

    Route::get('/notifications', function () {
        return view('pages.notifications.index');})->name('notifications');

    Route::get('/profile', 'ProfileController@index')->name('profile');

    Route::get('/settings', function () {
        return view('pages.settings.index');})->name('settings');

    Route::resource('posts', 'PostController');
    Route::get('/posts/{post}/comments', 'CommentController@showPostComments')->name('posts.comments');
    Route::post('/posts/{post}/comments', 'CommentController@store')->name('comments.store');
    Route::get('/comments/{id}/edit', 'CommentController@edit')->name('comments.edit');
    Route::put('/comments/{id}/edit', 'CommentController@update')->name('comments.update');
    Route::post('posts/{post}/like', 'PostController@toggleLike')->name('posts.like');
});

Route::get('/', 'HomeController@index')->name('home');
Route::get('/profiles/{id}', function ($id){
    return "bu sahifa mamnashu profilniki: " . $id;
})->name('profiles');
Route::get('/register', function () {
    return view('auth.register');
})->name('register');
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/register', 'AuthController@register')->name('register.posts');
Route::post('/login', 'AuthController@login')->name('login.posts');
Route::post('/logout', 'AuthController@logout')->name('logout');
