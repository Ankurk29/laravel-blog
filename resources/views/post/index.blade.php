@extends('layouts.master')

@section('section')
    @include('partials.posts_header')
    <div class="row mb-5">
        <div class="col-12 col-md-6 offset-md-3">
            <ol class="list-group list-group-numbered list-group-flush rounded-3">
                @foreach ($posts as $post)
                    <li
                        class="list-group-item list-group-item-action list-group-item-secondary border-0 d-flex align-items-center justify-content-between">
                        <a href="{{ route('post.show', $post->id) }}"
                            class="me-auto ms-2 text-black text-capitalize text-decoration-none">
                            <strong class="m-0">{{ $post->title }}</strong>
                        </a>
                        <div class="d-flex">
                            <a href="{{ route('post.edit.form', $post->id) }}" class="me-3">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="{{ route('post.delete', $post->id) }}" class="me-3">
                                <i class="bi bi-trash3"></i>
                            </a>
                        </div>
                    </li>
                @endforeach
            </ol>
        </div>
    </div>
@endsection
