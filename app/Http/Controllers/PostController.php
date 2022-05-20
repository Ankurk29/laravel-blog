<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        $posts = 'Post::all()';
        return view('index')->with(compact('posts'));
    }

    public function user_posts_index()
    {
        $posts = Post::all()->where('user_id', auth()->id());
        return view('post.index')->with(compact('posts'));
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('post.show')->with(compact('post'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $this->validate(request(),[
            'title' => ['required'],
            'content' => ['required']
        ]);

        Post::create([
            'title' => $request->title,
            'slug' => preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($request->title)),
            'content' => $request->content,
            'user_id' => auth()->id(),
            'featured' => $request->featured == 'on' ? true : false,
        ]);

        return redirect()->route('posts.index');
    }
}
