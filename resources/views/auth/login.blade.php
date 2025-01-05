@extends('layouts.app')

@section('content')
<h1>test login page</h1>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <!-- email -->
        <div class="div">
            <label for="name">Email</label>
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
        <button type="submit">Login</button>
    </form>
@endsection