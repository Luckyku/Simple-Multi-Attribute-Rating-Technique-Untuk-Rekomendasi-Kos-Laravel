@extends('admin.index.layout.main')
@section('container')

@if (session()->has('loginSuccess'))
    <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
        {{session('loginSuccess'). auth()->user()->name }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session()->has('tambahKos'))
    <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
        {{session('tambahKos')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session()->has('editKos'))
    <div class="alert alert-warning alert-dismissible fade show my-3" role="alert">
        {{session('editKos')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session()->has('delete'))
    <div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
        {{session('delete')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $titleWeb }}</h1>       
</div>
<div class="row mb-3"> 
    <div class="col d-flex">
        <a href="/dashboard/create" class="btn btn-success ">Tambah Data</a>
    </div>   
</div>

    
    <div class="table-responsive-lg">
        <table class="table  table-striped table-hover table-sm table-bordered">
        <thead class="bg-primary text-light ">
            <tr>
            <th scope="col" class="py-3 text-center">No</th>
            <th scope="col" class="py-3 text-center">Nama Kos</th>
            <th scope="col" class="py-3 text-center">Alamat</th>
            <th scope="col" class="py-3 text-center">Harga</th>
            <th scope="col" class="py-3 text-center">Fasilitas</th>
            <th scope="col" class="py-3 text-center">Jarak</th>
            <th scope="col" class="py-3 text-center">Luas Kamar</th>
            <th scope="col" class="py-3 text-center">Jenis Kos</th>
            <th scope="col" class="py-3 text-center">Dibuat pada</th>
            <th scope="col" class="py-3 text-center " style="width: 120px"  >Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kos as $indekos)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="text-capitalize">{{ Str::limit($indekos->nama, 25) }}</td>
                    <td>{{ Str::limit($indekos->alamat, 50) }}</td>
                    <td>@currency($indekos->harga) </td>
                    <td>{{ Str::limit($indekos->fasilitass->keterangan,20) }} </td>
                    <td>{{ $indekos->jarak }} Km</td>
                    <td>{{ $indekos->luas->nama }}</td>
                    <td>{{ $indekos->tipe->nama }}</td>
                    <td>{{ $indekos->created_at->diffForHumans() }}</td>
                    <td class="text-center ">
                        <a href="/dashboard/{{ $indekos->slug }}" class="badge text-bg-primary"><span data-feather='eye'></span></a>
                        <a href="/dashboard/{{ $indekos->slug }}/edit" class="badge text-bg-warning"><span data-feather='edit'></span></a>
                        <form action="/dashboard/{{ $indekos->slug }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge text-bg-danger border-0 " onclick="return confirm('are you sure?') "><span data-feather="trash"></span></button>
                            {{-- <a href="/{{ $indekos->id }}" class="badge text-bg-danger"><span data-feather='trash'></span></a> --}}
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
        <div class="mt-4">

            {{ $kos->links() }}
        
        </div>
        {{-- @php
            tes();
        @endphp --}}
    </div>
    @endsection