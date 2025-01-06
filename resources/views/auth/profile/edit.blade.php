@extends('layouts.dashboard')

@section('content')
    <h1>Edit Profile</h1>

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        
        <!-- Name Input -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>

        <!-- Email Input -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>

        <!-- Password Input (Optional) -->
        <div class="mb-3">
            <label for="password" class="form-label">New Password (Leave empty to keep current password)</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="New Password">
        </div>

        <!-- Password Confirmation Input (Optional) -->
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password">
        </div>

        <button type="submit" class="btn btn-success">Update Profile</button>
    </form>
@endsection
