@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>Welcome <h3> {{$user->name}}</h3></h1>
        <small>{{$user->email}}</small>
        <div class="mt-3">
            <a href="{{ route('profile.edit') }}" class="btn btn-warning">edit profile</a>
        </div>
    </div>
@endsection