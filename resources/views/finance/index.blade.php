@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
        <h1>My Finances</h1>

        @if($finances->isEmpty())
            <p>No financial records found.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Type</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Category</th>
                        <th scope="col">Description</th>
                        <!-- <th scope="col">Actions</th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($finances as $finance)
                        <tr>
                            <td>{{ $finance['date']->format('Y-m-d') }}</td>
                            <td>{{ $finance['type'] }}</td>
                            <td class="text-uppercase">RM{{ number_format($finance['amount'], 2) }}</td>
                            <td>{{ $finance['category'] ?? 'n/a' }}</td>
                            <td>{{ $finance['description'] ?? 'n/a' }}</td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        </div>
                </div>
                <!-- <div class="row">
                    <div class="col-3">
                        <a href="{{route('income.create')}}" class="btn btn-primary">add new</a>
                    </div>
                </div> -->
            </div>
@endsection