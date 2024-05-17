@extends('user.layouts.main')
@section('container')

{{-- <section id="rekomendasi" class="my-5">
    <div class="container">
        <div class="row mb-10">
            
        @foreach ($koss as $kos)
            <div class="col-md-4 mb-3">
                <div class="card" >
                    <div class="card  text-white">
                        <a href="/home/{{ $kos['slug'] }}"><img src="https://source.unsplash.com/500x500?room" class="card-img" alt="room2"></a>
                        @if ($kos['isFull'])
                        <a href="/home/{{ $kos['slug'] }}" class="d-block text-light">
                        <div class="card-img-overlay d-flex align-items-center p-0 ">
                            <h5 class="card-title text-center flex-fill bg-dark p-4">PENUH</h5>
                        </div>
                        </a>
                        @endif
                    </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="/home/{{ $kos['slug']}}" class="text-decoration-none text-dark text-capitalize ">{{ $kos['namaKos'] }}</a>
                            </h5>
                            <p class="text-muted"><small>{{ $kos['alamat'] }}</small></p>
                            <p class="card-text">Fasilitas : {{ $kos['fasilitas'] }}</p>
                            <p class="card-text">Jarak : <span class="text-muted">{{ $kos['jarak'] }} KM</span></p>
                            <p class="card-text">Luas Kamar : <span class="text-muted">{{ $kos['luas'] }} M</span></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="/home/{{ $kos['slug'] }}" class="btn btn-primary">Lihat</a>
                                <span class="fw-bold">@currency($kos['harga'])</span>
                            </div>
                        </div>
                </div>
            </div>
        @endforeach
        
        </div>
    </div>

    
</section> --}}

<section>
    <div class="container my-5">
        <div class="row">
            @if ($koss != null)
                @foreach ($koss as $kos)
                <div class="col-md-4 mb-3">
                    
                    <div class="card" >
                        
                        <div class="card  text-white">
                            <a href="/home/{{ $kos['slug'] }}"><img src="https://source.unsplash.com/500x500?room" class="card-img" alt="room"></a>
                            <a href="/home/{{ $kos['slug'] }}" class="d-block text-light">
                                <div class="card-img-overlay d-flex align-items-center p-0 ">
                                    <h5 class="card-title text-center flex-fill bg-dark p-4">Rekomendasi ke {{ $loop->iteration }} End-Value : {{ $kos['total'] }}</h5>
                                    {{-- <h5 class="card-title text-center flex-fill bg-dark p-4">Rekomendasi ke {{ $loop->iteration }}</h5> --}}
                                </div>
                                </a>
                        </div>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="/home/{{ $kos['slug'] }}" class="text-decoration-none text-dark text-capitalize ">{{ $kos['namaKos'] }}</a>
                                </h5>
                                {{-- <p>{{ $kos['total'] }}</p> --}}
                                <p class="text-muted"><small>{{ $kos['alamat'] }}</small></p>
                                <p class="card-text">Fasilitas : {{ $kos['fasilitas']}}</p>
                                <p class="card-text">Jarak : <span class="text-muted">{{ $kos['jarak'] }} KM</span></p>
                                <p class="card-text">Luas Kamar : <span class="text-muted">{{ $kos['luas'] }} M</span></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="/home/{{ $kos['slug'] }}" class="btn btn-primary">Lihat</a>
                                    <span class="fw-bold">@currency($kos['harga'])</span>
                                </div>
                            </div>
                    </div>
            </div>
            @endforeach
            @else
                <div class="row d-flex justify-content-center align-items-center flex-column" style="height: 500px">
                    <div class="col-lg-8 ">
                            <h3 class="text-muted text-center">MOHON MAAF KAMI TIDAK DAPAT MENEMUKAN REKOMENDASI YANG COCOK UNTUK ANDA</h3>
                    </div>
                    <div class="col-1 mt-5">
                        <a href="/home" class="btn btn-primary">kembali</a>
                    </div>
                </div>
                
            @endif
            
        </div>
    </div>
</section>
@endsection