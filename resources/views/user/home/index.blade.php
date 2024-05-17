@extends('user.layouts.main')
@section('container')
<section id="jumbotron" class="jumbotron-fluid background-jumbotron">

    <div class="container-fluid py-5 text-center">
        <h1 class="display-3 fw-bold">Rekomendasi Kos</h1>
        <p >Dapatkan rekomendasi kos yang akan ditinggali dengan menggunakan metode SMART <br>( Simple Multi Attribute Rating Technique )</p>
        
    </div>
</section>
<section id="daftar-kos" class="mt-5">
    <div class="container">
        <div class="row ">
            <div class="col d-flex align-items-center justify-content-center mb-5">
                <h1 class="display-1" >DAFTAR KOS</h1>
            </div>
        </div>
        <div class="row border-bottom">
            
            @foreach ($koss as $kos )            
            <div class="col-md-4 mb-3">
                <div class="card" >
                    {{-- @if ($kos->is_full)                        
                        <div class="position-absolute bg-dark p-2 " ><a href="" class="text-decoration-none text-white ">Penuh</a></div>
                    @endif
                    <a href=""><img src="https://source.unsplash.com/400x400?room" class="card-img-top" alt="room"></a> --}}
                    <div class="card  text-white">
                        <a href="/home/{{ $kos->slug }}"><img src="https://source.unsplash.com/500x500?room" class="card-img" alt="room"></a>
                        @if ($kos->is_full)
                        <a href="/home/{{ $kos->slug }}" class="d-block text-light">
                        <div class="card-img-overlay d-flex align-items-center p-0 ">
                            <h5 class="card-title text-center flex-fill bg-dark p-4">PENUH</h5>
                        </div>
                        </a>
                        @endif
                    </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="/home/{{ $kos->slug }}" class="text-decoration-none text-dark text-capitalize ">{{ $kos->nama }}</a>
                            </h5>
                            <p class="text-muted"><small>{{ $kos->alamat }}</small></p>
                            <p class="card-text">Fasilitas : {{ $kos->fasilitass->keterangan }}</p>
                            <p class="card-text">Jarak : <span class="text-muted">{{ $kos->jarak }} KM</span></p>
                            <p class="card-text">Luas Kamar : <span class="text-muted">{{ $kos->luas->nama }} M</span></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="/home/{{ $kos->slug }}" class="btn btn-primary">Lihat</a>
                                <span class="fw-bold">@currency($kos->harga)</span>
                            </div>
                        </div>
                </div>
            </div>
            @endforeach
            <div class="row mt-5">

                {{ $koss->links() }}
            </div>
        </div>
    </div>
</section>
{{-- <section id="rekomendasi" class="my-5">
    <div class="container">
    <div class="row ">
            <div class="col d-flex align-items-center justify-content-center mb-5">
                <h1 class="display-1" >REKOMENDASI KOS</h1>
            </div>
    </div>

    
    <div class="row d-flex justify-content-center mb-3">
        <div class="col-lg-8">
            <div class="card mb-3">
                <div class="card  text-white">
                    <div class="position-absolute bg-dark px-4 py-3 "><a href="" class="text-decoration-none text-white ">1</a></div>
                    <a href="/home/{{ $rekomendasis[0]->kos->slug }}">
                        <img src="https://source.unsplash.com/800x400?room" class="card-img" alt="room">
                    </a>
                        
                </div>
                <div class="card-bod text-center">
                    <h3 class="card-title text-capitalize"><a href="/home/{{ $rekomendasis[0]->kos->slug }}" class="text-decoration-none text-dark">{{ $rekomendasis[0]->kos->nama }}</a></h3>
                    <p>
                        <small class="text-muted">
                            <p class="text-muted"><small>{{ $rekomendasis[0]->kos->alamat }}</small></p>
                        </small>
                    </p>
                    <p class="card-text">Fasilitas : {{ $rekomendasis[0]->kos->fasilitass->keterangan }}</p>
                    <p class="card-text">Jarak : <span class="text-muted">{{ $rekomendasis[0]->kos->jarak }} KM</span></p>
                    <p class="card-text">Luas Kamar : <span class="text-muted">{{ $rekomendasis[0]->kos->luas->nama }} M</span></p>
                    <a href="/home/{{ $rekomendasis[0]->kos->slug }}" class="text-decoration-none btn btn-primary mb-2">Read More</a>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        @foreach ($rekomendasis->skip(1) as $rekomendasi )
        <div class="col-md-4 mb-3">
            <div class="card" >
                @php
                    $current = $loop->iteration ;
                    $no = $current + 1
                @endphp
                
                    <div class="card  text-white">
                        <img src="https://source.unsplash.com/500x500?room" class="card-img" alt="room">
                        
                        <div class="position-absolute bg-dark px-4 py-2 " ><a href="" class="text-decoration-none text-white ">{{ $no }}</a></div>
                    </div>
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="/home/{{ $rekomendasi->kos->slug }}" class="text-decoration-none text-dark text-capitalize ">{{ $rekomendasi->kos->nama }}</a>
                    </h5>
                    <p class="text-muted"><small>{{ $rekomendasi->kos->alamat }}</small></p>
                    <p class="card-text">Fasilitas : {{ $rekomendasi->kos->fasilitass->keterangan }}</p>
                    <p class="card-text">Jarak : <span class="text-muted">{{ $rekomendasi->kos->jarak }} KM</span></p>
                    <p class="card-text">Luas Kamar : <span class="text-muted">{{ $rekomendasi->kos->luas->nama }} M</span></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="/home/{{ $rekomendasi->kos->slug }}" class="btn btn-primary">Lihat</a>
                        <span class="fw-bold">@currency($rekomendasi->kos->harga)</span>
                    </div>
                </div>
            </div>
        </div>
            @endforeach
    </div>
</div>

</section> --}}

<section id="rekomendasi" class="my-5 b">
    <div class="container">
        <div class="col d-flex align-items-center justify-content-center mb-5">
                <h1 class="display-1" >CARI REKOMENDASI KOS</h1>
        </div>
        

        <div class="row">
            @if (session()->has('invalidRekomendasi'))
                <div class="alert alert-danger alert-dismissible fade show my-5" role="alert">
                    {{session('invalidRekomendasi')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            <form  action="/rekomendasi">
                @csrf
                <div class="row">
                    <div class="mb-3 col-3">
                        <label for="budget" class="form-label">Harga Kos Maksimal (Rp.)</label>
                        <input type="number" name="budget" class="form-control @error('budget')
                            is-invalid
                        @enderror" id="budget" min="300000"  value="{{ old('budget') }}" required placeholder="300000">
                        @error('budget')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3 col-3">
                        <label for="jarakMaks" class="form-label">Jarak Kos Maksimal (KM)</label>
                        <input type="number" name="jarakMaks" class="form-control @error('jarakMaks')
                            is-invalid
                        @enderror" id="jarakMaks" min="1"  value="{{ old('jarakMaks') }}" required placeholder="1" step="any">
                        @error('jarakMaks')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3 col-2">
                        <label for="fasilitas" class="form-label">Fasilitas</label>
                        <select class="form-select" id="fasilitas" name="fasilitas" aria-label="Floating label select example">
                            @foreach ($fasilitass as $fasilitas)
                            <option value="{{ $fasilitas->id }}">{{ $fasilitas->keterangan }}</option>
                            @endforeach
                        </select>
                    </div> 
                    <div class="mb-3 col-2">
                        <label for="luas_id" class="form-label">Luas Kamar</label>
                        <select class="form-select" id="luas_id" name="luas_id" aria-label="Floating label select example">
                            @foreach ($luas as $luasKamar)
                            <option value="{{ $luasKamar->id }}">{{ $luasKamar->nama }}</option>
                            @endforeach
                        </select>
                    </div> 
                    <div class="mb-3 col-2">
                        <label for="tipe_id" class="form-label">Tipe Kos</label>
                        <select class="form-select" id="tipe_id" name="tipe_id" aria-label="Floating label select example">
                            @foreach ($tipes as $tipe)
                            <option value="{{ $tipe->id }}">{{ $tipe->nama }}</option>
                            @endforeach
                        </select>
                    </div> 
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</section>
@endsection
