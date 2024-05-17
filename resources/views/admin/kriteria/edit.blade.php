@extends('admin.index.layout.main')
@section('container')



<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Kriteria</h1>        
</div>
<div class="row mb-3"> 
    <div class="col-lg-8 d-flex">
        <a href="/data-kriteria" class="btn btn-success ">Back</a>
    </div>   
</div>

<div class="row">
    <div class="col-lg-8">
    <form method="POST" action="/data-kriteria/{{ $kriteria->nama }}">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label text-capitalize">Kriteria : <span class="fw-bold">{{ $kriteria->nama }}</span></label>
            <input type="text" id="nama" name="nama" class="form-control @error('nama')
                is-invalid
            @enderror" id="nama" value="{{ old('nama', $kriteria->nama)  }}" hidden>
            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-2">
            <div class="mb-3">
                <label for="bobot" class="form-label">Bobot</label>
                <input type="number" min="0" max="100" name="bobot" class="form-control @error('bobot')
                    is-invalid
                @enderror" id="bobot" value="{{ old('bobot', $kriteria->bobot)  }}" step="any" >
                @error('bobot')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        

        <button type="submit" class="btn btn-primary">Update kriteria</button>
    </form>
    </div>
</div>


    @endsection