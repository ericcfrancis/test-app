@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>My expense</h1>
        <form action="#" method="POST">
            <div class="row mb-3">
                <label for="amount" class="form-label mb-0">Amount</label>
                <input type="number" class="form-control" disabled name="amount" value="{{ old('amount', $expense->amount) }}" required>
            </div>

            <div class="row mb-3">
                <label for="date" class="form-label mb-0">Date</label>
                <input type="date" class="form-control" disabled name="date" value="{{ old('date', $expense->date->format('Y-m-d')) }}" required>
            </div>

            <div class="row mb-3">
                <label for="category" class="form-label mb-0">Category</label>
                <input type="text" class="form-control" disabled name="category" value="{{ old('category', $expense->category) }}">
            </div>

            <div class="row mb-3">
                <label for="description" class="form-label mb-0">Description</label>
                <textarea class="form-control" disabled name="description">{{ old('description', $expense->description) }}</textarea>
            </div>

            <a href="{{ route('expense.edit', $expense->id) }}" class="btn btn-warning">Edit</a>
        </form>
    </div>
@endsection
