<?php

namespace App\Http\Controllers;

use App\Models\Simulasi;
use App\Http\Requests\StoreSimulasiRequest;
use App\Http\Requests\UpdateSimulasiRequest;

class SimulasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('simulasi.test');
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
    public function store(StoreSimulasiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Simulasi $simulasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Simulasi $simulasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSimulasiRequest $request, Simulasi $simulasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Simulasi $simulasi)
    {
        //
    }
}
