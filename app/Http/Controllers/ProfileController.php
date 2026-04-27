<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $posts = Auth::user()->posts()->latest()->paginate(4);
        return view('pages.profile.index', compact(['posts', 'user']));
    }

}
