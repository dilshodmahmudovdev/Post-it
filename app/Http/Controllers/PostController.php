<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Post;
use App\Services\PostService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function index()
    {
        $posts = Auth::user()->posts()->latest()->paginate(4);
        return view('pages.profile.index', compact('posts'));
    }

    public function create()
    {
        return view('pages.posts.create');
    }

    public function store(CreatePostRequest $request, PostService $service  )
    {
        $post = $service->create(
            Auth::user(),
            $request->validated()
        );

        return redirect()->route('posts.show', $post->id);
    }

    public function show(Post $post)
    {
        $auth_id = Auth::id();

        return view('pages.posts.show', compact('post', 'auth_id'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        if ($post->user_id !== Auth::id()){
            return redirect()->intended();
        }

        return view('pages.posts.edit', compact('post'));
    }

    public function update(UpdatePostRequest $request, $id)
    {
        $post = Post::findOrFail($id);

        $data = $request->validated();

        if ($request->hasFile('image'))
        {
            if ($post->img_url && Storage::disk('public')->exists($post->img_url)){
                Storage::disk('public')->delete($post->img_url);
            }

            $path = Storage::disk('public')->put('images', $request->file('image'));

            $data['img_url'] = $path;
        }

        $post->update($data);

        return redirect()->route('posts.show', $post->id);
    }

    public function destroy(Post $post)
    {
        if ($post->img_url && Storage::exists($post->img_url)) {
            Storage::delete($post->img_url);
        }
        $post->delete();

        return redirect()->route('profile')->with('success', 'Post muvaffaqiyatli olib tashlandi');
    }

    public function toggleLike(Post $post)
    {
        $user = auth()->user();

        if (!$user){
            return redirect()->route('login');
        }

        if ($post->likes()->where('likes.user_id', $user->id)->exists()){
            $post->likes()->detach($user->id);
        }else{
            $post->likes()->attach($user->id);
        }

        return back();
    }
}
