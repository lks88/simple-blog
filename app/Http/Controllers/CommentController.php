<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //
    public static function store(CommentRequest $request, $post) : RedirectResponse
    {
        //store comment

        $user = Auth::user();

        $comment = new Comment();
        $comment->user_id = $user->id;
        $comment->post_id = $post;
        $comment->body = $request->body;
        $comment->save();

        return back();
    }

    public static function delete(Comment $comment, Post $post)
    {
        //delete comment

        $comment->delete();

        return back();
    }
}
