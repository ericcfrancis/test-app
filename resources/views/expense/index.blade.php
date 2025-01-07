@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
        <h1>My Expenses</h1>

        @if($expenses->isEmpty())
            <p>No expense records found.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Amount</th>
                        <th scope="col">Description</th>
                        <th scope="col">Date</th>
                        <th scope="col">Category</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($expenses as $expense)
                        <tr>
                            <td class="text-uppercase">RM{{ number_format($expense->amount, 2) }}</td>
                            <td>{{ $expense->description ?? 'N/A' }}</td>
                            <td>{{ $expense->date->format('Y-m-d') }}</td>
                            <td>{{ $expense->category ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ route('expense.show', $expense->id) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('expense.edit', $expense->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('expense.destroy', $expense->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this expense?')">delete</button>
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
                        <a href="{{route('expense.create')}}" class="btn btn-primary">add new</a>
                    </div>
                </div>
            </div>
@endsection