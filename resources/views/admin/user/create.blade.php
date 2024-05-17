@extends('admin.index.layout.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambahkan Admin</h1>        
</div>
<div class="row mb-5">
    <div class="col-lg-3">
        <a href="/users" class="btn btn-success">Kembali</a>
    </div>
</div>

<div class="row mb-3">
    <div class="col-lg-8">
        <form action="/users" method="POST">
        @csrf

    <div class="row d-flex">
        <div class=" col-lg-8 mb-3">
            <label for="name"  class="form-label">Nama</label>
            <input type="text" class="form-control @error('name')
                is-invalid
            @enderror" id="name" name="name" value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class=" col-lg mb-3">
            <label for="username"  class="form-label">Username</label>
            <input type="text" class="form-control @error('username')
                is-invalid
            @enderror" id="username" name="username" value="{{ old('username') }}">
            @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control @error('email')
            is-invalid
        @enderror" id="email" name="email" value="{{ old('email') }}">
        @error('username')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control @error('password')
            is-invalid
        @enderror" id="password" name="password" value="{{ old('password') }}">
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <input id="is_admin" name="is_admin" type="hidden" value="1">


        <button class="btn btn-primary">Tambah</button>
        </form>
    </div>
</div>

@endsection