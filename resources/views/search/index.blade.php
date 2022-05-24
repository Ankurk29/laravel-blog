@extends('layouts.master')

@section('section')
    <div class="row my-4">
        <div class="col-12 col-md-8 offset-md-2">
            <h3 class="pb-4 fst-italic border-bottom">
                Showing Results for: {{ ucwords($search_term) . ' ' . '(' . count($posts) . ')' }}
            </h3>
            <div class="d-flex flex-wrap justify-content-between">
                @include('partials.post_card')
            </div>
        </div>
    </div>
@endsection
