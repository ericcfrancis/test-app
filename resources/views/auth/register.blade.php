@extends('layouts.app')

@section('content')
    <h1>test register page</h1>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <!-- name -->
        <div class="div">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <!-- email -->
        <div class="div">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <!-- password -->
        <div class="div">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            @error('password')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit">Register</button>
    </form>
@endsection