<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use App\Models\Alternatif;
use App\Http\Requests\StoreKosRequest;
use App\Http\Requests\UpdateKosRequest;
use App\Models\Fasilitas;
use App\Models\LuasKamar;
use App\Models\Tipe;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class KosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.index.index', [
            'titleWeb' => 'Dashboard',
            'kos' => Kos::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.index.create-kos', [
            'titleWeb' => 'Tambah Kos',
            'luas' => LuasKamar::all(),
            'fasilitas' => Fasilitas::all(),
            'tipe' => Tipe::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;

        $request['d_harga'] = convertHarga($request['harga']);
        $request['d_jarak'] = convertJarak($request['jarak']);
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'slug' => 'required|unique:kos',
            'alamat' => 'required|max:255|min:10',
            'fasilitas' => 'required|numeric',
            'harga' => 'required|numeric',
            'jarak' => 'required|numeric',
            'd_harga' => 'required|numeric',
            'd_jarak' => 'required|numeric',
            'luas_id' => 'required|numeric',
            'tipe_id' => 'required|numeric',
            'is_full' => 'required|boolean',
        ]);

        Kos::create($validatedData);
        // createAlternatif();

        return redirect('/dashboard')->with('tambahKos', 'New kos has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kos $dashboard)
    {
        return view('admin.index.info-kos',[
            'titleWeb' => 'Informasi Kos',
            'kos' => $dashboard,
            'luas' => LuasKamar::all(),
            'tipe' => Tipe::all()

        ]);
    }

    public function edit(Kos $dashboard)
    {
        return view('admin.index.edit-kos', [
            'titleWeb' => 'Edit Kos',
            'kos' => $dashboard,
            'luas' => LuasKamar::all(),
            'fasilitas' => Fasilitas::all(),
            'tipe' => Tipe::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKosRequest $request, Kos $dashboard)
    {

        $request['d_harga'] = convertHarga($request['harga']);
        $request['d_jarak'] = convertJarak($request['jarak']);
        $rules = [
            'nama' => 'required|max:255',
            'slug' => 'required',
            'alamat' => 'required|max:255|min:10',
            'fasilitas' => 'required|numeric',
            'harga' => 'required|numeric',
            'jarak' => 'required|numeric',
            'd_harga' => 'required|numeric',
            'd_jarak' => 'required|numeric',
            'luas_id' => 'required|numeric',
            'tipe_id' => 'required|numeric',
            'is_full' => 'required|boolean',
        ];

        if($request->slug != $dashboard->slug){
            $rules['slug'] = 'required|unique:kos';
        }
        $validatedData = $request->validate($rules);
        Kos::where('id', $dashboard->id)
            ->update($validatedData);
            
        // updateAlternatif($dashboard->id, $validatedData);

        // nilaiUtility();
        // endvalue();
        
        return redirect('/dashboard')->with('editKos', 'Data kos telah diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kos $dashboard)
    {
        $id= $dashboard->id;
        // deleteAlternatif($id);
        Kos::destroy($id);

        return redirect('/dashboard')->with('delete', 'Kos has been deleted!');
    }
    
    // public function checkSlug(Request $request){
    //     $slug = SlugService::createSlug(Kos::class, 'slug', $request->title);
    //     return Response()->json(['slug' => $slug]);
    // }

}
