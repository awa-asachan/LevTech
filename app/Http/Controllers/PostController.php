<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\PostRequest;

use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function index(Post $post)
    {
        Log::debug($post->getPaginateBylimit());
        return view('posts.index')->with(['posts' => $post->getPaginateBylimit()]); 
    }
    
    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
    }
    
    public function create()
    {
        return view('posts.create');
    
    }
    
    public function store(Post $post, PostRequest $request)
    {
        Log::debug($request);
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post)
    {
        return view('posts/edit')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        
        return redirect('/posts/' . $post->id);
    }
    
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
}
