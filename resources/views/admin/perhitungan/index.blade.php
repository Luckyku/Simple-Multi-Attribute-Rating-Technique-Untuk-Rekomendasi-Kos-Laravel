@extends('admin.index.layout.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Kriteria</h1>        
</div>

<div class="col-lg-8">
</div>

    
    <div class="col-lg-8">
        <table class="table  table-striped table-hover table-sm table-bordered">
        <thead class="bg-primary text-light ">
            <tr>
            <th scope="col" class="py-3 ">No</th>
            <th scope="col" class="py-3 text-center">Nama Kriteria</th>
            <th scope="col" class="py-3 text-center">Bobot</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kriteria as $kriterias)
                
                <tr>
                <th scope="row" >C{{ $loop->iteration }}</th>
                <td class="text-capitalize">{{ $kriterias->nama }}</td>
                <td class="text-center">{{ $kriterias->bobot }}</td>
                </tr>
            @endforeach
            <tr>
                <th></th>
                <th class="text-center ">Total</th>
                <th class="text-center">{{ $total }}</th>
                
            </tr>
            
        </tbody>
        </table>
    </div>
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Normalisasi Kriteria</h1>        
    </div>
    <div class="col-lg-4">
        <table class="table  table-striped table-hover table-sm table-bordered">
        <thead class="bg-primary text-light ">
            <tr>
            <th scope="col" class="py-3 ">No</th>
            <th scope="col" class="py-3 text-center">Nama Kriteria</th>
            <th scope="col" class="py-3 text-center">Normalisasi Bobot</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kriteria as $kriterias)
            <tr>
                <th>C{{ $loop->iteration }}</th>
                <td>{{ $kriterias->nama }}</td>
                <td>{{ $kriterias->normbobot }}</td>
            </tr>
            @endforeach
            
        </tbody>
        </table>
    </div>
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-nbobot-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Alternatif Tiap Sub Kriteria</h1>        
    </div>
    <div class="col-lg-8">
        <table class="table  table-striped table-hover table-sm table-bordered">
        <thead class="bg-primary text-light ">
            <tr>
            <th scope="col" class="py-3 ">No</th>
            <th scope="col" class="py-3 text-center">Nama Kriteria</th>
            <th scope="col" class="py-3 text-center">Harga</th>
            <th scope="col" class="py-3 text-center">Fasilitas</th>
            <th scope="col" class="py-3 text-center">Jarak</th>
            <th scope="col" class="py-3 text-center">Luas kamar</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($alternatifs as $alternatif)
                
                <tr>
                <th scope="row" >A{{ $loop->iteration }}</th>
                <td class="text-capitalize">{{ $alternatif->kos->nama }}</td>
                <td class="text-center" >@currency($alternatif->harga)</td>
                <td class="text-center" >{{ $alternatif->fasilitas }}</td>
                <td class="text-center" >{{ $alternatif->jarak }}</td>
                <td class="text-center" >{{ $alternatif->luas }}</td>
                </tr>
            @endforeach
            
        </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Nilai Utility Tiap Alternatif</h1>        
    </div>
    <div class="col-lg-8">
        <table class="table  table-striped table-hover table-sm table-bordered">
        <thead class="bg-primary text-light ">
            <tr>
            <th scope="col" class="py-3 ">No</th>
            <th scope="col" class="py-3 text-center">Nama Kriteria</th>
            <th scope="col" class="py-3 text-center">Harga</th>
            <th scope="col" class="py-3 text-center">Fasilitas</th>
            <th scope="col" class="py-3 text-center">Jarak</th>
            <th scope="col" class="py-3 text-center">Luas kamar</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($utility as $utilities)
                <tr>
                <th scope="row" >A{{ $loop->iteration }}</th>
                <td class="text-capitalize">{{ $utilities->kos->nama}} </td>
                <td class="text-center" >{{ $utilities->harga }}</td>
                <td class="text-center" >{{ $utilities->fasilitas}}</td>
                <td class="text-center" >{{ $utilities->jarak}}</td>
                <td class="text-center" >{{ $utilities->luas  }}</td>
                </tr>
            @endforeach
            
        </tbody>
        </table>
    </div>
    

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Hasil Akhir</h1>        
    </div>
    
    <div class="col-lg-8">
        <table class="table  table-striped table-hover table-sm table-bordered">
        <thead class="bg-primary text-light ">
            <tr>
            <th scope="col" class="py-3 ">No</th>
            <th scope="col" class="py-3 text-center">Nama Kos</th>
            <th scope="col" class="py-3 text-center">End Value</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($endvalues as $endvalue)
                <tr>
                <th scope="row" >A{{ $loop->iteration }}</th>
                <td class="text-capitalize">{{ $endvalue->kos->nama }}</td>
                <td class="text-center" >{{ $endvalue->end_value }}</td>
                </tr>
            @endforeach
            
        </tbody>
        </table>
    </div>

    {{-- @php

        nilaiUtility();
        endvalue();

    @endphp --}}
    @endsection