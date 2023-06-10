<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public static function index()
    {
        $posts = Post::all();

        return view('dashboard')->with('posts', $posts);
    }

    public static function show(Post $post)
    {
        //get user
        $user = User::find($post->user_id);

        //check if edited
        $edited = false;

        if($post->created_at != $post->updated_at){
            $edited = true;
        }

        return view('posts.index')->with([
            'post' => $post,
            'user' => $user,
            'edited' => $edited
        ]);
    }

    public static function create()
    {
        return view('posts.create');
    }

    public static function store(Request $request)
    {

    }

    public static function edit(Request $request)
    {

    }

    public static function delete()
    {

    }
}
