<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public static function index()
    {
        $posts = Post::all();

        return $posts;
    }

    public static function show()
    {

    }

    public static function create()
    {

    }

    public static function store(Request $request)
    {

    }

    public static function update(Request $request)
    {

    }

    public static function destroy()
    {

    }
}
