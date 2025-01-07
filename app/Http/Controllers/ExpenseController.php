<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $expenses = $user->expenses;
        
        return view('expense.index', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('expense.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount' =>'required|numeric',
            'date' =>'required|date',
            'category' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        $user = auth()->user();

        Expense::create([
            'user_id' => $user->id,
            'amount' => $request->amount,
            'date' => $request->date,
            'category' => $request->category,
            'description' => $request->description,
        ]);

        return redirect()->route('expense.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $expense = Expense::where('user_id', auth()->id())->findOrFail($id);

        return view('expense.show', compact('expense'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $expense = Expense::where('user_id', auth()->id())->findOrFail($id);

        return view('expense.edit', compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'amount' =>'required|numeric',
            'date' =>'required|date',
            'category' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        $expense = Expense::where('id', $id)
                    ->where('user_id', auth()->id())
                    ->firstOrFail();
        
        $expense->update([
            'amount' => $request->amount,
            'date' => $request->date,
            'category' => $request->category,
            'description' => $request->description,
        ]);

        $user = auth()->user();
        $expenses = $user->expense;

        return redirect()->route('expense.index', compact('expense'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $expense = Expense::where('user_id', auth()->id())->findOrFail($id);
        $expense->delete();

        $user = auth()->user();

        $expenses = $user->expense;

        return view('income.index', compact('expenses'));
    }
}
