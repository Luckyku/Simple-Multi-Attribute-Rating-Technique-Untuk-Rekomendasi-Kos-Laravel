@extends('admin.index.layout.main')
@section('container')

@if (session()->has('loginSuccess'))
    <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
        {{session('loginSuccess'). auth()->user()->name }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Rekomendasi Kos</h1>        
</div>

    
    <div class="table-responsive">
        <table class="table  table-striped table-hover table-sm table-bordered">
        <thead class="bg-primary text-light ">
            <tr>
                <th scope="col" class="py-3 text-center">Nama Kos</th>
            <th scope="col" class="py-3 text-center">No</th>
            <th scope="col" class="py-3 text-center">Harga</th>
            <th scope="col" class="py-3 text-center">Jarak</th>
            <th scope="col" class="py-3 text-center">Fasilitas</th>
            <th scope="col" class="py-3 text-center">Luas Kamar</th>
            <th scope="col" class="py-3 text-center">Jenis Kos</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kos as $indekos)
                <tr>
                    <td>{{ $indekos->nama }}</td>
                    <td>A{{ $loop->iteration }}</td>
                    <td>{{ $indekos->harga }}</td>
                    <td>{{ $indekos->jarak }}</td>
                    <td>{{ $indekos->fasilitas }}</td>
                    <td>{{ $indekos->luas_id }}</td>
                    <td>{{ $indekos->tipe_id }}</td>
                    
                </tr>

            @endforeach
        </tbody>
        </table>
        {{-- @php
            tes();
        @endphp --}}
    </div>
    @endsection