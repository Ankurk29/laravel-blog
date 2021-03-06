@extends('layouts.master')

@section('section')
    <div class="col-12 col-md-8 offset-md-2 my-5">
        @include('partials.breadcrumb')
        <article class="blog-post">
            <h1 class="blog-post-title text-capitalize mb-1">{{ $post->title }}</h1>
            <p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }}
                by <a href="{{ route('posts.index', $post->user->id) }}">{{ $post->user->name }}</a>
            </p>
            <p>{{ $post->content }}</p>
        </article>
    </div>
@endsection
