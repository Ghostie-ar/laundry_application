<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Imports\PaketImport;
use App\Http\Requests\StorePaketRequest;
use App\Http\Requests\UpdatePaketRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PaketExport;
use PhpOffice\PhpSpreadsheet\Calculation\Information\ExcelError;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pakets = Paket::all();
        return view('paket.data_paket')->with('pakets', $pakets);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Paket::create($request->all());
        return redirect('paket')->with('success', 'Data Telah Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paket $paket)
    {
        $paket->update($request->all());
        return redirect('paket')->with('success', 'Data Telah Diupdate');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Paket::where('id', $id)->delete();
        return redirect('paket')->with('success', 'Data Telah Dihapus');

    }
    public function exportData(){
        $date = date('Y-m-d');
        return Excel::download(new PaketExport, $date.'_paket.xlsx');
    }
    public function importData(){
        Excel::import (new PaketImport)->toCollection(request()->file('import'));

        return redirect(request()->segment(1). '/paket')->with('success', 'Import Data Telah Berhasil');
    }

}
