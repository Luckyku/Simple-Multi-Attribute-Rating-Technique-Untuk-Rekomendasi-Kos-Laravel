@extends('admin.index.layout.main')
@section('container')



<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Alternatif</h1>        
</div>
<div class="row mb-3"> 
    <div class="col-lg-8 d-flex">
        <a href="/data-alternatif" class="btn btn-success ">Back</a>
    </div>   
</div>

<div class="row">
    <div class="col-lg-8">
    <form method="POST" action="/data-alternatif/{{ $alternatif->id }}">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Kos</label>
            <input type="text" name="nama" class="form-control @error('nama')
                is-invalid
            @enderror" id="nama" value="{{  $alternatif->kos->nama , old('nama') }}" disabled>
            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" name="harga" class="form-control @error('harga')
                is-invalid
            @enderror" id="harga" value="{{  $alternatif->harga , old('harga') }}" disabled>
            @error('harga')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="fasilitas" class="form-label">Fasilitas</label>
            <input type="text" name="fasilitas" max="100" class="form-control @error('fasilitas')
                is-invalid
            @enderror" id="fasilitas" value="{{  $alternatif->fasilitas , old('fasilitas') }}" >
            @error('fasilitas')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jarak" class="form-label">Jarak</label>
            <input type="text" name="jarak" class="form-control @error('jarak')
                is-invalid
            @enderror" id="jarak" value="{{  $alternatif->jarak , old('jarak') }}" disabled>
            @error('jarak')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="luas" class="form-label">Luas</label>
            <input type="text" name="luas" class="form-control @error('luas')
                is-invalid
            @enderror" id="luas" value="{{  $alternatif->luas , old('luas') }}" disabled>
            @error('luas')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Alternatif</button>
    </form>
    </div>
</div>


    @endsection