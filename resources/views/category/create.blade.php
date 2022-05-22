@extends('layouts.master')

@section('section')
    @include('partials.posts_header')
    <div class="col-12 col-md-6 offset-md-4 my-5">
        <form action="{{ route('category.store') }}" method="POST" class="row row-cols-lg-auto g-3 align-items-center">
            @csrf
            <div class="col-12">
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInputName" placeholder="Enter Your Category"
                        name="name" required>
                    <label for="floatingInputName">Category</label>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Add Category</button>
            </div>
        </form>
    </div>
@endsection
