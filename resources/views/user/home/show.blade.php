@extends('user.layouts.main')
@section('container')
    
    <section class="mt-5">
        <div class="container">
            <div class="row d-flex justify-content-center gap-5 ">
                <div class="col-md-4 ">
                    <img src="https://source.unsplash.com/500x500?room" class="img-fluid" alt="room">
                </div>
                <div class="col-md-7 d-flex flex-column justify-content-between">
                    <div>                      
                        <h2 class="text-capitalize">{{ $kos->nama }}</h2>  
                        <p><small class="text-muted">{{ $kos->alamat }}</small></p>
                        <p>Harga Kos : @currency($kos->harga),00</p>
                        <p>Fasilitas : {{ $kos->fasilitass->keterangan }}</p>
                        <p>Jarak dari Universitas Jember : {{ $kos->jarak }} KM</p>
                        <p>Luas Kamar : {{ $kos->luas->nama }}</p>
                        <p>Kos {{ $kos->tipe->nama }}</p>
                    </div>
                    <div>
                        <a href="/home" class="btn btn-primary ">Back</a>
                    </div>
                    
                </div>
            </div>

            

            
            <div class="row my-5  border-top justify-content-between ">
                <div class="col ">

                    
                <h2 class="mt-2">Komentar</h2>
                @auth
                    <div class="col d-flex justify-content-center">
                    <div class="col-1 pt-2">
                        <p class="bi bi-person-square fs-2"></p>
                    </div>
                    <div class="col">

                        <form action="/komentar" class="form" method="POST">
                            @csrf
                            <div class="group mt-3">
                                <textarea placeholder="" id="comment" name="komen" rows="5" required=""></textarea>
                                <label for="komen">Comment</label>
                                <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                                <input type="hidden" value="{{ $kos->id }}" name="kos_id">
                            </div>
                            <button class="btn btn-primary">Kirim</button>
                        </form>
                    </div>
                </div>
                @endauth

                @if ($komentars->count())
                @foreach ($komentars as $komentar)
                <div class="col mt-3 comment-bg position-relative">
                    @auth
                        @if (auth()->user()->id == $komentar->user->id)
                            <form action="/komentar/{{ $komentar->id }}" method="POST" >
                                @method('delete')
                                @csrf   
                                
                                <div class="position-absolute top-0 end-0 px-2 py-1"><button class="btn text-mutedr border-0 " onclick="return confirm('komentarnya dihapus?') ">X</span></button></div>
                            </form>
                        @endif
                    @endauth
                    
                    <div class="row p-2 ">
                        
                        <div class="col-1 "><p class="bi bi-person-square fs-2"></p></div>
                        <div class="col ">
                            <h4 class="m-0 p-0 text-capitalize">{{ $komentar->user->name}}</h4>
                            <small class="text-muted"> {{ $komentar->created_at->diffForHumans() }}</small>
                            <p class="mt-2">{{ $komentar->komen }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
            <div class="col my-3 comment-bg">
                <div class="row">
                    <div class="col d-flex justify-content-center align-items-center" style="height: 100px">
                        <h4 class="text-muted">Tidak Ada Komentar</h4>
                    </div>
                </div>
            </div>
                
            @endif
                </div>
                <div class="col">
                    <img src="/img/comment.jpg" class="img-fluid" alt="">
                </div>
                


            </div>
            
            
            
        </div>
    </section>
@endsection