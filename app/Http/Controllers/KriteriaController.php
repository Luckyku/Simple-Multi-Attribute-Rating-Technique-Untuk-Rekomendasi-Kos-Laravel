<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Http\Requests\StoreKriteriaRequest;
use App\Http\Requests\UpdateKriteriaRequest;
use App\Models\Nkriteria;
use App\Http\Traits;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $total = Kriteria::get('bobot')->sum('bobot');
        return view('admin.kriteria.index', [
            'titleWeb' => 'Kriteria',
            'kriteria' => Kriteria::all(),
            'total' => $total,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { return view('admin.kriteria.create', [
        'titleWeb' => 'Tambah Kriteria'
    ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKriteriaRequest $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255|unique:kriterias|alpha',
            'bobot' => 'required|integer',
            'tipe' => 'required|max:10'
        ]);
        $validatedData['nama'] = strtolower($request->nama);
        Kriteria::create($validatedData);

        normalisasiBobot();
        endValue();
        

        return redirect('/data-kriteria')->with('storedKriteria', 'New kriteria has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kriteria $kriteria)
    {
        // return 'tes';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kriteria $data_kriterium)
    {
        // return $data_kriterium;
        return view('admin.kriteria.edit', [
            'titleWeb' => 'Edit Kriteria',
            'kriteria' => $data_kriterium
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKriteriaRequest $request, Kriteria $data_kriterium)
    {
        $rules = [
            'nama' => 'required|max:255|string|alpha',
            'bobot' => 'required|integer'
        ];

        if ($request->nama != $data_kriterium->nama) {
            $rules['nama'] = 'required|unique:kriterias|max:255|string|alpha:ascii';
        }

        $validatedData = $request->validate($rules);
        Kriteria::where('id', $data_kriterium->id)
            ->update($validatedData);
        normalisasiBobot();
        nilaiUtility();
        endValue();

        return redirect('/data-kriteria')->with('updatedKriteria', 'Data kriteria telah diperbarui');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kriteria $data_kriterium)
    {
        // return $data_kriterium;

        Kriteria::destroy($data_kriterium->id);
        normalisasiBobot();

        return redirect('/data-kriteria')->with('delete', 'Kriteria has been deleted!');
    }
    
    
}
