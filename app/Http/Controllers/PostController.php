<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'user_posts_index']);
    }

    public function index()
    {
        if (request()->has('month') || request()->has('year')) {
            $posts = Post::latest()
                ->filter(request(['month', 'year']))
                ->get();
        } else {
            $posts = Post::with('categories')->get();
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
        $categories = Post::with('categories')->find($id)->categories;
        return view('post.show')->with(compact('post', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('post.create')->with(compact('categories'));
    }

    public function store(Request $request)
    {

        $this->validate(request(), [
            'title' => ['required'],
            'content' => ['required']
        ]);

        $post = Post::create([
            'title' => $request->title,
            'slug' => preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($request->title)),
            'content' => $request->content,
            'user_id' => auth()->id(),
            'featured' => $request->featured == 'on' ? true : false
        ]);

        if ($request->has('categories')) {
            $post->categories()->attach($request->categories);
        }

        return redirect()->route('posts.index', auth()->id());
    }

    public function edit($id)
    {
        $post = Post::with('categories')->where('id', $id)->get();
        $categories = Category::all();
        return view('post.edit')->with(compact('post', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->categories);
        $this->validate(request(), [
            'title' => ['required'],
            'content' => ['required']
        ]);

        $post = Post::whereId($id)->first();
        $post->update([
            'title' => $request->title,
            'slug' => preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($request->title)),
            'content' => $request->content,
            'featured' => $request->featured == 'on' ? true : false
        ]);

        if ($request->has('categories')) {
            $post->categories()->sync($request->categories);
        } else {
            $post->categories()->detach();
        }

        return redirect()->route('posts.index', auth()->id());
    }

    public function destroy($id)
    {
        $post = Post::whereId($id)->first();
        $post->categories()->detach();
        $post->delete();

        return redirect()->back();
    }
}
