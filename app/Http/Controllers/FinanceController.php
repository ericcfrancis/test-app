<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Expense;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function index()
    {
        $user = auth()->user();
    
        $finances = collect()
            ->merge(
                $user->incomes()->select(['amount', 'date', 'category', 'source as description'])->get()
                    ->map(fn($income) => $income->setAttribute('type', 'Income'))
            )
            ->merge(
                $user->expenses()->select(['amount', 'date', 'category', 'description'])->get()
                    ->map(fn($expense) => $expense->setAttribute('type', 'Expense') )
            )
            ->sortByDesc('date');
        
        return view('finance.index', compact('finances'));
    }
}
