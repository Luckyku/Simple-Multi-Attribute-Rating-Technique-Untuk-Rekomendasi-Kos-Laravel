@extends('admin.index.layout.main')
@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Informasi Kos</h1>        
</div>
<div class="row mb-3"> 
    <div class="col-lg-8 d-flex gap-2">
        <a href="/rekomendasi-kos" class="btn btn-success "><span data-feather="arrow-left"></span>Back</a>
        
    </div>   
</div>

<div class="row">
    <div class="col-lg-8">
        
    <div class="table-responsive">
        <table class="table  table-striped table-hover table-sm table-bordered">
        <thead class="bg-primary text-light ">
            <tr>
            <th scope="col" class="py-2 ">Nama Kos</th>
            <th scope="col" class="py-2 ">{{ $kos->nama }}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Alamat kos</td>
                <td>{{ $kos->alamat }}</td>
            </tr>
            
            <tr>
                <td>Fasilitas</td>
                <td>{{ $kos->fasilitass->keterangan }}</td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>{{ $kos->harga }}</td>
            </tr>
            <tr>
                <td>Jarak</td>
                <td>{{ $kos->jarak }} Km</td>
            </tr>
            <tr>
                <td>Luas Kamar</td>
                <td>{{ $kos->luas->nama }}</td>
            </tr>
            <tr>
                <td>Status Kos   </td>
                @if ($kos->is_full)
                    <td>Penuh</td>
                @else
                    <td>Tersedia</td>
                @endif
            </tr>
            <tr>
                <td>Jenis Kos   </td>
                <td>{{ $kos->tipe->nama }}</td>
            </tr>
        </tbody>
        </table>
    </div>
    </div>
</div>
@endsection
