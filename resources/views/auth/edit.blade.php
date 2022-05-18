@extends('layouts.master')

@section('section')
    <div class="row py-5">
        <div class="col-12 col-md-6 offset-md-3">
            <form action="{{ route('user.update') }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Current Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="mb-3">
                    <label for="new_password" class="form-label">New Password</label>
                    <input type="password" class="form-control" name="new_password" id="new_password">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            @if ($errors->any())
                <div class="form-group pt-5">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
