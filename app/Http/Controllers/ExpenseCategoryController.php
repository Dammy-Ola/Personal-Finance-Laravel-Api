<?php

namespace App\Http\Controllers;

use App\Models\ExpenseCategory;
use App\Http\Requests\StoreExpenseCategoryRequest;
use App\Http\Requests\UpdateExpenseCategoryRequest;
use App\Http\Resources\ExpenseCategoryResource;

class ExpenseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return ExpenseCategoryResource::collection(ExpenseCategory::latest()->paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExpenseCategoryRequest $request)
    {
        //
        $validatedExpenseCategory = $request->validated();

        $expenseCategory = ExpenseCategory::create($validatedExpenseCategory);

        return new ExpenseCategoryResource($expenseCategory);
    }

    /**
     * Display the specified resource.
     */
    public function show(ExpenseCategory $expenseCategory)
    {
        //
        return new ExpenseCategoryResource($expenseCategory);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExpenseCategoryRequest $request, ExpenseCategory $expenseCategory)
    {
        //
        $validatedExpenseCategory = $request->validated();

        $expenseCategory->update($validatedExpenseCategory);

        return new ExpenseCategoryResource($expenseCategory);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExpenseCategory $expenseCategory)
    {
        //
        $expenseCategory->delete();
        return new ExpenseCategoryResource($expenseCategory);
    }
}
