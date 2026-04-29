<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $posts = Auth::user()->posts()->latest()->paginate(4);
        return view('pages.profile.index', compact(['posts', 'user']));
    }

    public function update(ProfileUpdateRequest $request)
    {
        $user = auth()->user();

        $data = [
            'bio' => $request->input('bio')
        ];

        if ($request->hasFile('profile_photo')){

            if($user->profile_photo_path){
                Storage::disk('public')->delete($user->profile_photo_path);
            }

            $data['profile_photo_path'] = $request->file('profile_photo')
                ->store('profile-photos', 'public');

        }

        if ($request->hasFile('cover_photo')){

            if ($user->cover_photo_path){
                Storage::disk('public')->delete($user->cover_photo_path);
            }

            $data['cover_photo_path'] = $request->file('cover_photo')
                ->store('cover-photos', 'public');

        }

        $user->update($data);

        return redirect()->route('profile')->with('success', 'Profile muvaffaqiyatli ynagilandi');
    }

}
