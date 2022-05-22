@extends('layouts.master')

@section('section')
    @include('partials.posts_header')
    <div class="col-12 col-md-6 offset-md-3">
        <form action="{{ route('post.store') }}" method="post">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInputTitle" placeholder="Post Title" name="title">
                <label for="floatingInputTitle">Title</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Content" id="floatingTextarea" style="height: 250px"
                    name="content"></textarea>
                <label for="floatingTextarea">Content</label>
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" name="featured">
                <label class="form-check-label" for="flexSwitchCheckDefault">Featured Post</label>
            </div>
            <label for="select">Categories</label>
            <select id="select" name="categories[]" class="form-select" size="3" multiple
                aria-label="size 3 select example">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ ucwords(str_replace('-', ' ', $category->name)) }}</option>
                @endforeach
            </select>
            <div class="my-3">
                <button type="submit" class="btn btn-primary">Publish</button>
            </div>
        </form>
    </div>
@endsection
