@extends('layouts.app')

@section('content')
    <h1>Dashboard</h1>
    <div>
        @auth
            <form action="{{ route('logout') }}" method="POST" >
                @csrf
                <button type="submit">Logout</button>
            </form>
        @endauth
    </div>
@endsection