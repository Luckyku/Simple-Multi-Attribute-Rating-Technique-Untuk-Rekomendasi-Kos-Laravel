<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use App\Models\EndValue;
use Illuminate\Http\Request;

class RekomendasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.rekomendasi-kos.index', [
            'titleWeb' => 'Rekomendasi kos',
            'kos' => Kos::orderBy('id', 'asc')->get()
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Kos $rekomendasi_ko)
    {
        return view('admin.rekomendasi-kos.info-kos', [
            'titleWeb' => 'Rekomendasi Kos',
            'kos' => $rekomendasi_ko,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kos $kos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kos $rekomendasi_ko)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kos $kos)
    {
        //
    }
}
