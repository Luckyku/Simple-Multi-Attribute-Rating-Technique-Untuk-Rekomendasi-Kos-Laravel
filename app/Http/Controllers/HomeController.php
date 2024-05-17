<?php

namespace App\Http\Controllers;

use App\Models\EndValue;
use App\Models\Fasilitas;
use App\Models\Komentar;
use App\Models\Kos;
use App\Models\LuasKamar;
use App\Models\Tipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rekomendasi = EndValue::select('end_values.*')->
                        join('kos', 'end_values.kos_id', '=', 'kos.id')->
                        where('is_full', '=', false)->orderByDesc('end_value')->limit(4)->get();
                        
        return view('user.home.index', [
            'titleWeb' => 'Home',
            'title' => 'home',
            'luas'=> LuasKamar::all(),
            'tipes'=> Tipe::all(),
            'fasilitass' => Fasilitas::all(),
            'koss' => Kos::with('luas', 'fasilitass')->latest()->paginate(6),
            'rekomendasis'=> $rekomendasi
            // 'rekomendasis' => EndValue::with('kos')->orderBy('end_value', 'desc')->take(5)->get()
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
    public function show(Kos $home)
    {
        $kos_id = $home->id;
        // $komentar = Komentar::select('komentars.*')->
        //                 where('kos_id', '=', "$kos_id")
        //                 ->join('users', 'komentars.user_id', '=', 'users.id')
        //                 ->get();
        
        return view('user.home.show',[
            'title'=>'home',
            'kos'=> $home,
            // 'komentars'=> Komentar::all()
            'komentars'=> Komentar::where('kos_id', '=', "$kos_id")
                ->with('kos','user')
                ->get()
            
        ]);
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
