@extends('layouts.master')

@section('section')
    @include('partials.posts_header')
    <div class="row mt-3 mb-5">
        <div class="col-12 col-md-6 offset-md-3">
            <div class="list-group list-group-number">
                @foreach ($categories as $category)
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="{{ route('category.index', $category) }}"
                            class="list-group-item list-group-item-action me-4">{{ ucwords(str_replace('-', ' ', $category)) }}
                        </a>
                        @if (Auth::check())
                            <form action="{{ route('category.delete', $category) }}" method="POST" class="me-3">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn p-0 d-flex btn-link"><i class="bi bi-trash3"></i></button>
                            </form>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
