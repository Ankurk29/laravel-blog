<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $this->validate(request(), [
            'search' => 'required'
        ]);

        $search_term = $request->search;
        $posts = Post::where('title', 'like', '%' . strtolower($search_term) . '%')->get();

        return view('search.index')->with(compact('search_term', 'posts'));
    }
}
