@extends('admin.index.layout.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Kriteria</h1>        
</div>
{{-- <div class="col-lg-8">
    <a href="/data-kriteria/create" class="btn btn-success mb-3"><span data-feather="plus"></span> Tambah Data</a>
</div> --}}
<div class="col-lg-8">

    @if (session()->has('updatedKriteria'))
    <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
        {{session('updatedKriteria') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if (session()->has('storedKriteria'))
    <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
        {{session('storedKriteria') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if (session()->has('delete'))
    <div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
        {{session('delete') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

</div>

    
    <div class="col-lg-8">
        <table class="table  table-striped table-hover table-sm table-bordered">
        <thead class="bg-primary text-light ">
            <tr>
            <th scope="col" class="py-3 ">No</th>
            <th scope="col" class="py-3 text-center">Nama Kriteria</th>
            <th scope="col" class="py-3 text-center">Bobot</th>
            <th scope="col" class="py-3 text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kriteria as $kriterias)
                
                <tr>
                <th scope="row" >C{{ $loop->iteration }}</th>
                <td class="text-capitalize">{{ $kriterias->nama }}</td>
                <td class="text-center">{{ $kriterias->bobot }}</td>
                <td class="text-center">
                        <a href="/data-kriteria/{{ $kriterias->nama }}/edit" class="badge text-bg-warning"><span data-feather='edit'></span></a>
                        {{-- <form action="/data-kriteria/{{ $kriterias->nama }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge text-bg-danger border-0" onclick="return confirm('are you sure?') "><span data-feather="trash"></span></button>
                            <a href="/{{ $indekos->id }}" class="badge text-bg-danger"><span data-feather='trash'></span></a>
                        </form> --}}
                </td>
                </tr>
            @endforeach
            <tr>
                <th></th>
                <th>Total bobot</th>
                <th class="text-center">{{ $total }}</th>
                <td></td>
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
    @endsection