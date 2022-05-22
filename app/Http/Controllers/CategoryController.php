<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->pluck('name');

        return view('category.index')->with(compact('categories'));
    }

    public function category_posts_index($category)
    {
        $posts_by_cat = Category::with('posts')->where('name', $category)->get();
        return view('category.post_index')->with(compact('category', 'posts_by_cat'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Category $cat)
    {
        $this->validate(request(), [
            'name' => 'required'
        ]);

        $cat->name = preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower(request('name')));
        $cat->user_id = auth()->id();
        $cat->save();

        return redirect()->route('category');
    }

    public function destroy(Request $request)
    {
        $cat = Category::whereName($request->name)->first();
        $cat->posts()->detach();
        $cat->delete();

        return redirect()->route('category');
    }
}
