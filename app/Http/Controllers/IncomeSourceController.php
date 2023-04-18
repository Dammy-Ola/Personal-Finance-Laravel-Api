<?php

namespace App\Http\Controllers;

use App\Models\IncomeSource;
use App\Http\Requests\StoreIncomeSourceRequest;
use App\Http\Requests\UpdateIncomeSourceRequest;
use App\Http\Resources\IncomeSourceResource;

class IncomeSourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return IncomeSourceResource::collection(IncomeSource::latest()->paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIncomeSourceRequest $request)
    {
        //
        $validatedIncomeSource = $request->validated();

        $incomeSource = IncomeSource::create($validatedIncomeSource);

        return new IncomeSourceResource($incomeSource);
    }

    /**
     * Display the specified resource.
     */
    public function show(IncomeSource $incomeSource)
    {
        //
        return new IncomeSourceResource($incomeSource);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIncomeSourceRequest $request, IncomeSource $incomeSource)
    {
        //
        $validatedIncomeSource = $request->validated();

        $incomeSource->update($validatedIncomeSource);

        return new IncomeSourceResource($incomeSource);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IncomeSource $incomeSource)
    {
        //
        $incomeSource->delete();
        return new IncomeSourceResource($incomeSource);
    }
}
