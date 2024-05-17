<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\NilaiUtility;
use App\Models\Alternatif;
use App\Models\EndValue;
use Illuminate\Http\Request;

class SMART extends Controller
{
    public function index(){

        return view('admin.perhitungan.index',[
            'titleWeb' => 'Data Perhitungan',
            'kriteria' => Kriteria::get(),
            'alternatifs' => Alternatif::orderBy('kos_id', 'asc')->get(),
            'utility' => NilaiUtility::orderBy('kos_id', 'asc')->get(),
            'endvalues'=> EndValue::orderBy('kos_id', 'asc')->get(),
            'total' => Kriteria::get()->sum('bobot'),
        ]);
    }
}
