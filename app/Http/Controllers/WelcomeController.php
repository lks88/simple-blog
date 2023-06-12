<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public static function index()
    {
        $posts = Post::all();

        return view('welcome')->with('post', $posts);
    }
}
