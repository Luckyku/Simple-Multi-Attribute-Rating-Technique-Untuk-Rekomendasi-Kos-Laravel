<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmartController extends Controller
{
    // $aKos = SMART();
    public function index(){
        
        

        $kos = SMART(request('budget'), request('fasilitas'), request('jarakMaks'), request('luas_id'), request('tipe_id'));
        // dd($kos);

        if($kos == null){
            // return redirect()->back()->with('invalidRekomendasi', 'tidak dapat menemukan rekomendasi yang sesuai');
            return view('user.home.show-rekomendasi', [
                'koss' => null,
                'title'=> 'Rekomendasi'
            ]);
        }else{
            $collection = collect($kos);



            // foreach ($kos as $k) {
            //     echo $k['namaKos'];
            // }
            return view('user.home.show-rekomendasi', [
                'koss' => $collection->where('isFull', '=', false)->sortByDesc('total')->take(3),
                'title' => 'Rekomendasi',
            ]);
        }
        
    }

}
