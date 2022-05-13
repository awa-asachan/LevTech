<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts.index')->with(['posts' =>$post->getPaginateBylimit()]);
    }
    public function show(Post $post)
    {
        return view('show')->with(['posts' =>$post]);   
    }
}