@extends('layouts.master')

@section('section')
    <div class="row my-4">
        <div class="col-12 col-md-8 offset-md-2">
            <h3 class="pb-4 fst-italic border-bottom">
                From the {{ ucwords(str_replace('-', ' ', $category)) }}
            </h3>
            <div class="d-flex flex-wrap justify-content-between">
                @foreach ($posts_by_cat as $posts)
                    @php
                        $posts = $posts->posts;
                    @endphp
                    @include('partials.post_card')
                @endforeach
            </div>
        </div>
    </div>
@endsection
