<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Post;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(CreateCommentRequest $request, Post  $post)
    {
        $post->comments()->create([
            'user_id' => Auth::id(),
            'body' => $request->body,
        ]);

        return back();
    }

    public function showPostComments(Post $post)
    {
        $post->load('comments.user');

        return view('pages.comments.index', compact('post'));
    }

    public function edit()
    {}

    public function update()
    {}

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return url()->previous();
    }
}
