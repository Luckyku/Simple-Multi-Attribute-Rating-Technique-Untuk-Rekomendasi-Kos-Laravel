@extends('admin.index.layout.main')
@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Kos</h1>        
</div>
<div class="row mb-3"> 
    <div class="col-lg-8 d-flex">
        <a href="/dashboard" class="btn btn-success ">Back</a>
    </div>   
</div>

<div class="row mb-5">
    <div class="col-lg-8">
    <form method="POST" action="/dashboard">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Kos</label>
            <input type="text" name="nama" class="form-control @error('nama')
                is-invalid
            @enderror" id="nama" value="{{ old('nama') }}" autofocus placeholder="nama kos">
            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control @error('slug')
                is-invalid
            @enderror" id="slug" value="{{ old('slug') }}" autofocus placeholder="nama-kos">
            @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat Kos</label>
            <input type="text" name="alamat" class="form-control @error('alamat')
                is-invalid
            @enderror" id="alamat" value="{{ old('alamat') }}" placeholder="alamat lengkap kos">
            @error('alamat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="row d-flex">
            <div class="mb-3 col-8">
                <label for="fasilitas" class="form-label">Fasilitas</label>
                <select class="form-select" id="fasilitas" name="fasilitas" aria-label="Floating label select example">
                    @foreach ($fasilitas as $fasilitass)
                    <option value="{{ $fasilitass->bobot }}">{{ $fasilitass->keterangan }}</option>
                    @endforeach
                </select>
            </div> 
            <div class="mb-3 col-4" >
                <label for="tipe_id" class="form-label">Tipe</label>
                <select class="form-select" id="tipe_id" name="tipe_id" aria-label="Floating label select example">
                    @foreach ($tipe as $tipeKos)
                    <option value="{{ $tipeKos->id }}">{{ $tipeKos->nama }}</option>
                    @endforeach
                </select>
            </div> 
        </div>
        <div class="row d-flex">

            <div class="mb-3 col-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" name="harga" class="form-control @error('harga')
                    is-invalid
                @enderror" id="harga" min="100000"  value="{{ old('harga') }}" placeholder="100000">
                @error('harga')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 col-3" >
                <label for="jarak" class="form-label">Jarak</label>
                <input type="number" name="jarak" class="form-control @error('jarak')
                    is-invalid
                @enderror" id="jarak" min="0" max="5" value="{{ old('jarak') }}" step="any" placeholder="0.1">
                @error('jarak')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 col-3">
                <label for="luas_id" class="form-label">Luas Kamar</label>
                <select class="form-select" id="luas_id" name="luas_id" aria-label="Floating label select example">
                    @foreach ($luas as $luasKamar)
                    <option value="{{ $luasKamar->id }}">{{ $luasKamar->nama }}</option>
                    @endforeach
                </select>
            </div> 

            <div class="mb-3 col-3" >
                <label for="is_full" class="form-label">Status Kos</label>
                <select class="form-select" id="is_full" name="is_full" aria-label="Floating label select example">
                    <option value="0">Tidak Penuh</option>
                    <option value="1">Penuh</option>
                </select>
                @error('is_full')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div> 
        </div>
        
        

        

        <button type="submit" class="btn btn-primary">Tambah Kos</button>
    </form>
    </div>
</div>

<script>
    const nama = document.querySelector("#nama");
    const slug = document.querySelector("#slug");



    nama.addEventListener("keyup", function() {
        let preslug = nama.value;
        preslug = preslug.replace(/ /g,"-");
        slug.value = preslug.toLowerCase();
    });


</script>

    @endsection