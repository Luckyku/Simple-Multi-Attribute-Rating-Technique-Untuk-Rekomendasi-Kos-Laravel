<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Http\Requests\StoreAlternatifRequest;
use App\Http\Requests\UpdateAlternatifRequest;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.alternatif.index', [
            'titleWeb' => 'Data Sub Kriteria',
            'alternatifs' => Alternatif::orderBy('kos_id')->get()
        ]);
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
    public function store(StoreAlternatifRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Alternatif $alternatif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alternatif $data_alternatif)
    {
        return view('admin.alternatif.edit', [
            'titleWeb' => 'Edit Data Alternatif',
            'alternatif'=> $data_alternatif,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlternatifRequest $request, Alternatif $data_alternatif)
    {
        
        $rules = [
            'fasilitas' => 'required|numeric|max:100',
        ];

        $validatedData = $request->validate($rules);
        Alternatif::where('id', $data_alternatif->id)
            ->update($validatedData);
        
        return redirect('/data-alternatif')->with('edit', 'Data alternatif sudah diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alternatif $alternatif)
    {
        //
    }
}
