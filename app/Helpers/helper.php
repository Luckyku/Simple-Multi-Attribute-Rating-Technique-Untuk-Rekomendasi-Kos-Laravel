<?php

use App\Models\Kos;
use App\Models\Kriteria;
use App\Models\NilaiUtility;
use App\Models\SubKriteria;
use App\Models\Alternatif;
use App\Models\EndValue;
use App\Models\Fasilitas;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

function convertHarga($harga){
    if($harga <= 400000){
        return 1;
    }
    if(400000 < $harga && $harga <= 600000){
        return 2;
    }
    if(600000 < $harga && $harga <= 800000){
        return 3;
    }
    if(800000 < $harga && $harga <= 1000000){
        return 4;
    }
    if(1000000 < $harga && $harga <= 1200000){
        return 5;
    }
    if(120000 > $harga ){
        return 6;
    }
}
function convertJarak($jarak){
    if($jarak <= 0.5){
        return 1;
    }
    if(0.5 <$jarak && $jarak <= 1){
        return 2;
    }
    if(1 <$jarak && $jarak <= 1.5){
        return 3;
    }
    if($jarak >= 1.5){
        return 4;
    }
}

function SMART($hargaFilter, $fasilitasFilter, $jarakFilter, $luasFilter, $tipeFilter){
    $koss = Kos::where('harga', '<=', $hargaFilter)
        ->where('jarak', '<=', $jarakFilter )
        ->where('Fasilitas', '>=', $fasilitasFilter)
        ->where('luas_id', '>=', $luasFilter)
        ->where('tipe_id', '=', $tipeFilter)
        ->get();
    $kriterias = Kriteria::all();
    if ($koss->count() < 2){
        return null;
    }
    // if($koss->count()<2){

    //     // dd($koss);
    //     return redirect()->back()->with('invalidRekomendasi', 'tidak dapat menemukan kos yang cocok');
    // } else{
        $aKos = [];
        foreach ($koss as $kos) {
            $total = 0;
            // ======= nilai utility ======
            foreach ($kriterias as $kriteria) {

                if ($kriteria->nama == 'harga') {
                    $ci = $kos->d_harga;
                    $max = $koss->max('d_harga');
                    $min = $koss->min('d_harga');
                    if($max-$min == 0){
                        return $aKos = null;
                    }
                    $utility = round(100 * (($max - $ci) / ($max - $min)), 2);
                    $endvalue = round($utility * $kriteria->normbobot, 2);
                    $total += $endvalue;
                    // echo "kos $kos->nama dengan nilai harga $kos->harga memiliki NU = $utility dengan endvalue $endvalue ";
                }

                if ($kriteria->nama == 'fasilitas') {
                    $ci = $kos->fasilitas;
                    $max = $koss->max('fasilitas');
                    $min = $koss->min('fasilitas');
                    if($max-$min == 0){
                        return $aKos = null;
                    }
                    $utility = round(100 * (($ci - $min) / ($max - $min)), 2);
                    $endvalue = round($utility * $kriteria->normbobot, 2);
                    $total += $endvalue;
                    // echo "kos $kos->nama dengan nilai harga $kos->harga memiliki NU = $utility dengan endvalue $endvalue ";
                }

                if ($kriteria->nama == 'jarak') {
                    $ci = $kos->d_jarak;
                    $max = $koss->max('d_jarak');
                    $min = $koss->min('d_jarak');
                    if($max-$min == 0){
                        return $aKos = null;
                    }
                    $utility = round(100 * (($max - $ci) / ($max - $min)), 2);
                    $endvalue = round($utility * $kriteria->normbobot, 2);
                    $total += $endvalue;
                    // echo "kos $kos->nama dengan nilai jarak $kos->jarak memiliki NU = $utility dengan endvalue $endvalue ";
                }

                if ($kriteria->nama == 'luas') {
                    $ci = $kos->luas_id;
                    $max = $koss->max('luas_id');
                    $min = $koss->min('luas_id');
                    if($max-$min == 0){
                        return $aKos = null;
                    }
                    $utility = round(100 * (($ci - $min) / ($max - $min)), 2);
                    $endvalue = round($utility * $kriteria->normbobot, 2);
                    $total += $endvalue;
                    // echo "kos $kos->nama dengan nilai harga $kos->harga memiliki NU = $utility dengan endvalue $endvalue ";

                }

                // echo "<br> ";
            }
            // $aKos= toArray
            $aKos[] = array(
                'id' => $kos->id,
                'namaKos' => $kos->nama,
                'slug' => $kos->slug,
                'alamat' => $kos->alamat,
                'fasilitas' => $kos->fasilitass->keterangan,
                'harga' => $kos->harga,
                'jarak' => $kos->jarak,
                'luas' => $kos->luas->nama,
                'isFull' => $kos->is_full,
                'total' => $total
            );


            // echo "dengan total $total <br>";
        }

        return $aKos;
    // }

}




function createAlternatif(){

    $kos = DB::table('kos')->latest()->first();
    $id = $kos->id;
    $fasilitass = Fasilitas::all();
    $fasilitas = $fasilitass->find($kos->fasilitas);
    
        Alternatif::create([
            'kos_id'=> $id,
            'harga' => $kos->harga,
            'fasilitas' => $fasilitas->bobot,
            'jarak'=> $kos->jarak,
            'luas'=> $kos->luas_id
        ]);
        
    nilaiUtility();
    endvalue();

}
function deleteAlternatif($id){
    DB::table('alternatifs')->where('kos_id', $id)->delete();
    DB::table('nilai_utilities')->where('kos_id', $id)->delete();
    DB::table('end_values')->where('kos_id', $id)->delete();
}
function updateAlternatif($id,  $validateData){
    

    Alternatif::where('kos_id', $id)
        ->update(
            [
            'harga'=> $validateData['harga'],
            'fasilitas'=> $validateData['fasilitas'],
            'jarak'=>$validateData['jarak'],
            'luas'=> $validateData['luas_id'],
            ]
        );

    nilaiUtility();
    endvalue();
}

function normalisasiBobot(){
    $bobots = Kriteria::get();
    $totalBobot = Kriteria::get('bobot')->sum('bobot');

    foreach ($bobots as $bobot){    
        $normBobot= Kriteria::find($bobot->id);
        $normBobot->normbobot = round($bobot->bobot/ $totalBobot, 2);
        $normBobot->save();
    }
}


function nilaiUtility(){
    $alternatif = Alternatif::get();
    $kriteria = Kriteria::get();
        
    foreach ($alternatif as $alternatifs){
        $idkos = $alternatifs->kos_id;
        foreach ($kriteria as $kriterias){
            // $NU = NilaiUtility::find($idkos->kos_id);
            $tipe = $kriterias->tipe;
            $cout = $alternatifs[$kriterias->nama];
            // $utility = null;
            
            $nama = $kriterias->nama;
            if ($tipe == 'cost'){
                $utility = utilityCost($nama, $cout);
                // $NU->$nama= $utility;
            }
            if ($tipe == 'benefit'){
                $utility = utilityBenefit($nama, $cout);
                // $NU->$nama= $utility;
                
                
            }
            DB::table('nilai_utilities')
                ->updateOrInsert(
                    ['kos_id' => $idkos],
                    [$nama => $utility,]
            );
        }
    }
}


function utilityBenefit($kriteria, $cout){
    $min = Alternatif::min($kriteria);
    $max = Alternatif::max($kriteria);
    $utility =round( 100 * (($cout - $min) / ($max - $min)), 2);
    return $utility;
    
}
function utilityCost ($kriteria, $cout){
    $min = Alternatif::min($kriteria);
    $max = Alternatif::max($kriteria);
    $utility =round ( 100 * (($max - $cout) / ($max - $min)), 2);
    return $utility;
    
}

function endValue(){
    $utility = nilaiUtility::get();
    $kriteria = Kriteria::get();
    $endvalue = EndValue::get();
    foreach ($utility as $utilities){
        $total = 0;
        $slug = $utilities->kos->slug;
        foreach($kriteria as $kriterias){
            $name = $kriterias->nama;
            $nilaiUtility = $utilities->$name;
            $BobotNormalisasi = $kriterias->normbobot;
            $endvalue = round($nilaiUtility*$BobotNormalisasi, 2);
            $total += $endvalue;

        }
        $idkos= $utilities->kos_id;
        

        DB::table('end_values')
                ->updateOrInsert(
                    ['kos_id' => $idkos],
                    ['slug' => $slug, 'end_value'=>$total]
            );
            
        
    }
}