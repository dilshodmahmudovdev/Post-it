<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CreateCommentRequest;
use App\Post;
use Illuminate\Http\Request;
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

    public function edit(Comment $comment)
    {
        $this->authorize('update', $comment);

        return view('pages.comments.edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {

        $data = $request->validate([
            'body' => 'required|min:3'
        ]);

        $comment->update($data);

        return redirect()->route('posts.comments', $comment->post_id);
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return url()->previous();
    }
}
