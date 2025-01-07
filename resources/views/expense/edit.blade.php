@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>Edit Expense</h1>
        <form action="{{ route('expense.update', $expense->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row mb-3">
                <label for="amount" class="form-label mb-0">Amount</label>
                <input type="number" class="form-control" name="amount" value="{{ old('amount', $expense->amount) }}" required>
                @error('amount')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="row mb-3">
                <label for="date" class="form-label mb-0">Date</label>
                <input type="date" class="form-control" name="date" value="{{ old('date', $expense->date->format('Y-m-d')) }}" required>
                @error('date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="row mb-3">
                <label for="category" class="form-label mb-0">Category</label>
                <input type="text" class="form-control" name="category" value="{{ old('category', $expense->category) }}">
                @error('category')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="row mb-3">
                <label for="description" class="form-label mb-0">Description</label>
                <textarea class="form-control" name="description">{{ old('description', $expense->description) }}</textarea>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-warning">Update expense</button>
        </form>
    </div>
@endsection
