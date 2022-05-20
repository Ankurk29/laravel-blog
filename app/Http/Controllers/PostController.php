<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show', 'user_posts_index']);
    }

    public function index() {
        if ( request()->has('month') || request()->has('year')) {
            $posts = Post::latest()
                ->filter(request(['month', 'year']))
                ->get();
        } else {
            $posts = Post::all();
        }

        $featured = Post::where('featured', 1)->first();

        return view('index')->with(compact('posts', 'featured'));
    }

    public function user_posts_index($id)
    {
        $posts = Post::all()->where('user_id', $id);
        return view('post.index')->with(compact('posts'));
    }

    public function show($id)
    {
        $post = Post::with('user')->find($id);
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
            'featured' => $request->featured == 'on' ? true : false
        ]);

        return redirect()->route('posts.index', auth()->id());
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('post.edit')->with(compact('post'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(request(),[
            'title' => ['required'],
            'content' => ['required']
        ]);

        Post::where('id', $id)->update([
            'title' => $request->title,
            'slug' => preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($request->title)),
            'content' => $request->content,
            'featured' => $request->featured == 'on' ? true : false
        ]);

        return redirect()->route('posts.index', auth()->id());
    }

    public function destroy($id)
    {
        Post::where('id', $id)->delete();

        return redirect()->back();
    }
}
