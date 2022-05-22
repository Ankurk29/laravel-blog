@extends('layouts.master')

@section('section')
    <div class="row my-5">
        <div class="col-12 col-md-6 offset-md-3">
            <form action="{{ route('post.update', $post[0]->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInputTitle" placeholder="Post Title" name="title"
                        value="{{ $post[0]->title }}">
                    <label for="floatingInputTitle">Title</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Content" id="floatingTextarea" style="height: 250px"
                        name="content">{{ $post[0]->content }}</textarea>
                    <label for="floatingTextarea">Content</label>
                </div>
                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" name="featured"
                        {{ $post[0]->featured ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Featured Post</label>
                </div>
                <label for="select">Categories</label>
                <select id="select" name="categories[]" class="form-select" size="3" multiple
                    aria-label="size 3 select example">
                    @foreach ($categories as $category)
                        <option
                            @foreach ($post[0]->categories as $selectedCat) @if ($selectedCat->id === $category->id)
                                    selected @endif
                            @endforeach
                            value="{{ $category->id }}">
                            {{ ucwords(str_replace('-', ' ', $category->name)) }}
                        </option>
                    @endforeach
                </select>
                <div class="my-3">
                    <button type="submit" class="btn btn-primary">Update Post</button>
                </div>
            </form>
        </div>
    </div>
@endsection
