<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        //check if creator
        $can_edit = false;

        if($user == Auth::user()){
            $can_edit = true;
        }

        return view('posts.index')->with([
            'post' => $post,
            'user' => $user,
            'edited' => $edited,
            'can_edit' => $can_edit
        ]);
    }

    public static function create()
    {
        return view('posts.create');
    }

    public static function store(Request $request)
    {
        $user = Auth::user();

        $post = new Post;
        $post->user_id = $user->id;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

    }

    public static function edit(Request $request)
    {

    }

    public static function delete()
    {

    }
}
