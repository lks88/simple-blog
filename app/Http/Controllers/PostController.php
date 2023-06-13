<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PostController extends Controller
{

    public static function index()
    {
        //show all posts

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

        //get all post comments
        $post_comments = Comment::where('post_id', $post->id)->with('user')->get();

        return view('post.index')->with([
            'post' => $post,
            'user' => $user,
            'comments' => $post_comments,
            'edited' => $edited,
            'can_edit' => $can_edit
        ]);
    }

    public static function create() : View
    {
        return view('post.create');
    }

    public static function store(PostRequest $request) : RedirectResponse
    {
        $user = Auth::user();

        $post = new Post;
        $post->user_id = $user->id;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return Redirect::to('/post/'.$post->id);
    }

    public static function edit(Post $post)
    {
        return view('post.edit')->with('post', $post);
    }

    public static function update(PostUpdateRequest $request, Post $post) : RedirectResponse
    {
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return Redirect::to('/post/'.$post->id);
    }

    public static function delete(Post $post)
    {
       $post->delete();

        return redirect('dashboard');
    }
}
