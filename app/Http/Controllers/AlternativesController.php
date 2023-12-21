<?php

namespace App\Http\Controllers;

use App\Models\Alternatives;
use App\Http\Requests\StoreAlternativesRequest;
use App\Http\Requests\UpdateAlternativesRequest;

class AlternativesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alternatives = Alternatives::all();

        return view('alternative.index', compact('alternatives'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlternativesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Alternatives $alternatives)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alternatives $alternatives)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlternativesRequest $request, Alternatives $alternatives)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alternatives $alternatives)
    {
        //
    }
}
