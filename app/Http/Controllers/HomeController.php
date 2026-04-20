<?php

namespace App\Http\Controllers;

use App\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->latest()->paginate(2);

        return view('pages.home.index', compact('posts'));
    }
    //
}
