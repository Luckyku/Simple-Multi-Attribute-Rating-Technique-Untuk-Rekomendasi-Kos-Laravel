@extends(' admin.index.layout.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Alternatif</h1>        
</div>
{{-- <div class="col-lg-8">
    <a href="/data-kriteria/create" class="btn btn-success mb-3"><span data-feather="plus"></span> Tambah Data</a>
</div> --}}
<div class="col-lg-8">

    @if (session()->has('edit'))
    <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
        {{session('edit') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    

</div>

    <div class="col-lg-10">
        <table class="table  table-striped table-hover table-sm table-bordered">
        <thead class="bg-primary text-light ">
            <tr>
            <th scope="col" class="py-3 ">No</th>
            <th scope="col" class="py-3 text-center">Nama Kos</th>
            <th scope="col" class="py-3 text-center">Harga</th>
            <th scope="col" class="py-3 text-center">Fasilitas</th>
            <th scope="col" class="py-3 text-center">Jarak</th>
            <th scope="col" class="py-3 text-center">Luas Kamar</th>
            {{-- <th scope="col" class="py-3 text-center" >Action</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($alternatifs  as $alternatif)                
                <tr>
                <th scope="row" >A{{ $loop->iteration }}</th>
                <td class="text-capitalize">{{ $alternatif->kos->nama }}</td>
                <td class="text-center" > @currency($alternatif->harga) </td>
                <td class="text-center">{{ $alternatif->fasilitas }}</td>
                <td class="text-center" >{{ $alternatif->jarak }}</td>
                <td class="text-center" >{{ $alternatif->luas }}</td>
                {{-- <td class="text-center" >
                        <a href="/data-alternatif/{{ $alternatif->id }}/edit" class="badge text-bg-warning"><span data-feather='edit'></span></a></td>
                </tr> --}}
            @endforeach
            
        </tbody>
        </table>
    </div>


    
    @endsection