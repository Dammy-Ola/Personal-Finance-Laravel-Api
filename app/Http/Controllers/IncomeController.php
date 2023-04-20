<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Http\Requests\StoreIncomeRequest;
use App\Http\Requests\UpdateIncomeRequest;
use App\Http\Resources\IncomeResource;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return IncomeResource::collection(Income::latest()->with(['income_source'])->paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIncomeRequest $request)
    {
        //
        $validatedIncome = $request->validated();

        $income = Income::create($validatedIncome);

        return new IncomeResource($income);
    }

    /**
     * Display the specified resource.
     */
    public function show(Income $income)
    {
        //
        return new IncomeResource($income::with(['income_source'])->get()[0]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIncomeRequest $request, Income $income)
    {
        //
        $validatedIncome = $request->validated();

        $income->update($validatedIncome);

        return new IncomeResource($income);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Income $income)
    {
        //
        $income->delete();
        return new IncomeResource($income);
    }
}
