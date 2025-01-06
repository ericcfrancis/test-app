@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
        <h1>My Incomes</h1>

        @if($incomes->isEmpty())
            <p>No income records found.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Amount</th>
                        <th scope="col">Description</th>
                        <th scope="col">Date</th>
                        <th scope="col">Category</th>
                        <th scope="col">Source</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($incomes as $income)
                        <tr>
                            <td>RM{{ number_format($income->amount, 2) }}</td>
                            <td>{{ $income->description ?? 'N/A' }}</td>
                            <td>{{ $income->date->format('Y-m-d') }}</td>
                            <td>{{ $income->category ?? 'N/A' }}</td>
                            <td>{{ $income->source ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ route('income.show', $income->id) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('income.edit', $income->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('income.destroy', $income->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this income?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <a href="{{route('income.create')}}" class="btn btn-primary">add new</a>
                    </div>
                </div>
            </div>
@endsection