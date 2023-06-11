<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //
    public static function index()
    {

    }

    public static function show()
    {

    }

    public static function create()
    {

    }

    public static function store(Request $request, $post)
    {

        $user = Auth::user();

        $comment = new Comment();
        $comment->user_id = $user->id;
        $comment->post_id = $post;
        $comment->body = $request->body;
        $comment->save();

        return redirect();
    }

    public static function update()
    {

    }

    public static function delete(Comment $comment)
    {
        $comment->delete();

        return redirect();
    }
}
