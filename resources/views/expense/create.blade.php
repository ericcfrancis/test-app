@extends('layouts.dashboard')
@section('content')
<div class="container">
    <div class="row m-3 justify-content-start">
        <div class="col-8">
            <div class="row">
                <h2>add expense</h2>
            </div>
            <form action="{{ route('expense.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <label for="amount" class="form-label mb-0">Amount</label>
                    <input type="number" class="form-control" name="amount" required>
                </div>

                <div class="row mb-3">
                    <label for="date" class="form-label mb-0">Date</label>
                    <input type="date" class="form-control" name="date" required>
                </div>

                <div class="row mb-3">
                    <label for="category" class="form-label mb-0">Category</label>
                    <input type="text" class="form-control" name="category">
                </div>
                
                <button type="submit" class="btn btn-warning">Add Expense</button>
            </form>
        </div>
    </div>
</div>
@endsection