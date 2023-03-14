<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Http\Requests\StoreOutletRequest;
use App\Http\Requests\UpdateOutletRequest;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $outlets = outlet::all();
        return view('outlet.data_outlet')->with('outlets', $outlets);
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
    public function store(StoreOutletRequest $request)
    {
        outlet::create($request->all());
        return redirect('outlet')->with('success', 'Data Telah Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Outlet $outlet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Outlet $outlet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOutletRequest $request, Outlet $outlet)
    {
        outlet::create($request->all());
        return redirect('outlet')->with('success', 'Data Telah Ditambahkan');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        outlet::find($id)->delete();
        return redirect('outlet')->with('success', 'Data Telah Dihapus');
    }
}
