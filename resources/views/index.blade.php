@extends('layouts.master')
@section('section')
    @includeUnless(request()->has('month') && request()->has('year'), 'partials.featured_post')
    <div class="row g-5">
        <div class="col-md-8">
            @if (request()->has('month') && request()->has('year'))
                <h3 class="pb-4 fst-italic border-bottom">
                    Archive : {{ ucwords(request()->month . ' ' . request()->year) }}
                </h3>
            @endif
            <div class="d-flex flex-wrap justify-content-between">
                @include('partials.post_card')
            </div>
        </div>
        <div class="col-md-4">
            @include('partials.sidebar')
        </div>
    </div>
@endsection
