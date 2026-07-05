<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreExpenseRequest;
use Illuminate\Http\Request;
use App\Models\Expense;

class ExpenseController extends Controller
{
    public function index(Request $request)
{
    $expenses = Expense::query();

    if ($request->category) {
        $expenses->where('category', $request->category);
    }

    $expenses = $expenses->latest()->get();

    $totalAmount = $expenses->sum('amount');

return view('expenses.index', compact('expenses', 'totalAmount'));
}
    public function store(StoreExpenseRequest $request)
    {
        
        Expense::create([
            'title' => $request->title,
            'amount' => $request->amount,
            'category' => $request->category,
            'expense_date' => $request->expense_date,
        ]);

        return redirect('/expenses')->with('success', 'Expense added successfully!');
    }

    public function destroy($id)
{
    Expense::destroy($id);

    return redirect('/expenses')->with('success', 'Expense deleted successfully!');
}

public function edit($id)
{
    $expense = Expense::find($id);

    return view('expenses.edit', compact('expense'));
}
public function update(Request $request, $id)
{
    $request->validate([
    'title' => 'required',
    'amount' => 'required|numeric|min:0',
    'category' => 'required',
    'expense_date' => 'required|date',
]);
    $expense = Expense::find($id);

    $expense->title = $request->title;
    $expense->amount = $request->amount;
    $expense->category = $request->category;
    $expense->expense_date = $request->expense_date;

    $expense->save();

    return redirect('/expenses')->with('success', 'Expense updated successfully!');
}
}