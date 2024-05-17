@extends('admin.index.layout.main')
@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Kriteria</h1>        
</div>
<div class="row mb-3"> 
    <div class="col-lg-8 d-flex">
        <a href="/data-kriteria" class="btn btn-success ">Back</a>
    </div>   
</div>

<div class="row">
    <div class="col-lg-8">
    <form method="POST" action="/data-kriteria">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Kriteria</label>
            <input type="text" name="nama" class="form-control @error('nama')
                is-invalid
            @enderror" id="nama" value="{{ old('nama') }}" autofocus>
            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="bobot" class="form-label">Bobot</label>
            <input type="number" min="0" max="100" name="bobot" class="form-control @error('bobot')
                is-invalid
            @enderror" id="bobot" value="{{ old('bobot')  }}"  >
            @error('bobot')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tipe" class="form-label">Tipe Kriteria</label>
            <select class="form-select" id="tipe" name="tipe" aria-label="Floating label select example">
                <option value="cost">Cost</option>
                <option value="benefit">Benefit</option>
            </select>
            @error('tipe')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Tambah Kos</button>
    </form>

    </div>
</div>

{{-- <script>
    const nama = document.querySelector("#nama");
    const slug = document.querySelector("#slug");



    nama.addEventListener("keyup", function() {
        let preslug = nama.value;
        preslug = preslug.replace(/ /g,"-");
        slug.value = preslug.toLowerCase();
    });


</script> --}}

    @endsection