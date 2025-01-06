<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $incomes = $user->incomes;

        return view('income.index', compact('incomes'));
    }

    public function create()
    {
        return view('income.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'source' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
        ]);

        $user = auth()->user();

        Income::create([
            'user_id' => $user->id,
            'amount' => $request->amount,
            'date' => $request->date,
            'source' => $request->source,
            'category' => $request->category,
        ]);

        return redirect()->route('income.index')->with('success', 'Income added successfully!');
    }

    public function show(string $id)
    {
        $income = Income::where('user_id', auth()->id())->findOrFail($id);

        return view('income.show', compact('income'));
    }

    public function edit(string $id)
    {
        $income = Income::where('user_id', auth()->id())->findOrFail($id);

        return view('income.edit', compact('income'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'source' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:500',
        ]);

        $income = Income::where('id', $id)
                    ->where('user_id', auth()->id())
                    ->firstOrFail();

        $income->update([
            'source' => $request->source,
            'amount' => $request->amount,
            'date' => $request->date,
            'category' => $request->category,
            'description' => $request->description,
        ]);

        $user = auth()->user();

        $incomes = $user->incomes;

        return view('income.index', compact('incomes'));
    }

    public function destroy(string $id)
    {
        $income = Income::where('user_id', auth()->id())->findOrFail($id);
        $income->delete();

        $user = auth()->user();

        $incomes = $user->incomes;

        return view('income.index', compact('incomes'));
    }
}
