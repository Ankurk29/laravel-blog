@extends('layouts.master')

@section('section')
    <div class="row my-5">
        <div class="col-12 col-md-6 offset-md-3">
            <form action="{{ route('post.update', $post->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInputTitle" placeholder="Post Title" name="title"
                        value="{{ $post->title }}">
                    <label for="floatingInputTitle">Title</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Content" id="floatingTextarea" style="height: 250px"
                        name="content">{{ $post->content }}</textarea>
                    <label for="floatingTextarea">Content</label>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" name="featured"
                        {{ $post->featured ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Featured Post</label>
                </div>
                <div class="my-3">
                    <button type="submit" class="btn btn-primary">Update Post</button>
                </div>
            </form>
        </div>
    </div>
@endsection
