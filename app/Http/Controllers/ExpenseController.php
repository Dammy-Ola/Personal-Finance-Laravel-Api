<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;
use App\Http\Resources\ExpenseResource;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return ExpenseResource::collection(Expense::latest()->paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExpenseRequest $request)
    {
        //
        $validatedExpense = $request->validated();

        $expense = Expense::create($validatedExpense);

        return new ExpenseResource($expense);
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        //
        return new ExpenseResource($expense);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExpenseRequest $request, Expense $expense)
    {
        //
        $validatedExpense = $request->validated();

        $expense->update($validatedExpense);

        return new ExpenseResource($expense);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();
        return new ExpenseResource($expense);
    }
}
