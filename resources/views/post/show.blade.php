@extends('layouts.master')

@section('section')
    <div class="col-12 col-md-8 offset-md-2 my-5">
        @include('partials.breadcrumb')
        <article class="blog-post">
            <h1 class="blog-post-title text-capitalize mb-1">{{ $post->title }}</h1>
            <p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }}
                @if (Auth::check())
                    by <a href="">{{ auth()->user()->name }}</a>
                @endif
            </p>
            <p>{{ $post->content }}</p>
        </article>
    </div>
@endsection
