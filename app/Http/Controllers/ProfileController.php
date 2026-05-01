<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\User;

class ProfileController extends Controller
{

    // == OWN PROFILE METHODS == //

    public function index()
    {
        $user = Auth::user();
        $posts = Auth::user()->posts()->latest()->paginate(4);
        return view('pages.profile.index', compact(['posts', 'user']));
    }

    public function showMyMedia ()
    {
        $media = '';
    }

    public function follow (User $user)
    {

        $authUser = Auth::user();

        if ($authUser->id === $user->id){
            return back();
        }

        if ($authUser->followings()->where('user_id', $user->id)->exists()){
            //unfollow
            $authUser->followings()->detach($user->id);
        }else{
            //follow
            $authUser->followings()->attach($user->id);
        }

        return back();
    }

    public function showFollowings()
    {
        $user = Auth::user();

        $followings = $user->followings()->latest()->paginate(10);
        return view('pages.follow.index', compact('followings'));
    }

    public function searchPage ()
    {
        return view('pages.search.index');
    }

    public function search(Request $request)
    {
        $query = $request->input('search');

        $users = User::where(function ($q) use ($query) {
            $q->where('full_name', 'like', "%{$query}%")
                ->orWhere('email', 'like', "%{$query}%");
        })->get();

        return view('pages.search.index', compact('users', 'query'));
    }

    // == OTHER PROFILE METHODS

    public function show (User $user)
    {
        $posts = $user->posts()->latest()->paginate(4);
        return view('pages.profile.index', compact(['user', 'posts']));
    }

//    public function showMedia (User $user)
//    {
//        $media = '';
//    }


    // == === == //



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
