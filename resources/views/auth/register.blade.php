@extends('layouts.app')

@section('content')
<div class="row justify-content-center align-items-center">
    <div class="col-5 my-3">
        <div class="row text-center">
            <h1>test register page</h1>
        </div>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <!-- name -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
            <!-- email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
            <!-- password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
                @error('password')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
            <div class="row justify-content-center">
                <button class="btn btn-warning w-100 px-3" type="submit">register</button>
            </div>
        </form>
        <div class="row text-center mt-2">
            <small>already registered? login <a href="{{ route('login.form') }}">here</a></small>
        </div>
    </div>
    <hr>
</div>
@endsection