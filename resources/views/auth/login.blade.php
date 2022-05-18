@extends('layouts.master')
@section('section')
    <div class="row py-5">
        <div class="col-12 col-md-6 offset-md-3">
            <form action="{{ route('loggedin') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email"
                        required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password"
                        placeholder="Enter Your Password" required>
                </div>
                <button type="submit" class="btn btn-primary">Log in</button>
            </form>
        </div>
    </div>
@endsection
