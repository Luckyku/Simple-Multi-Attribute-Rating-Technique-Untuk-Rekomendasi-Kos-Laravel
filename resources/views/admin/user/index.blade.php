@extends('admin.index.layout.main')
@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Manage User</h1>        
</div>

    <div class="container">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table  table-striped table-hover table-sm table-bordered">
                <thead class="bg-primary text-light ">
                    <tr>
                    <th scope="col" class="py-3 text-center">No</th>
                    <th scope="col" class="py-3 text-center">Nama User</th>
                    <th scope="col" class="py-3 text-center">Username</th>
                    <th scope="col" class="py-3 text-center">Email</th>
                    <th scope="col" class="py-3 text-center">Created At</th>
                    {{-- <th scope="col" class="py-3 text-center">Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->diffForHumans() }}</td>
                            {{-- <td class="text-center ">
                                <a href="/rekomendasi-kos/{{ $user->username }}" class="badge text-bg-primary"><span data-feather='eye'></span></a>                        
                            </td> --}}
                        </tr>

                    @endforeach
                </tbody>
                </table>            
            </div>
            {{ $users->links() }}
        </div>

        
    </div>

    {{-- ======= ADMIN ======== --}}
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Manage Admin</h1>        
</div> 
{{-- ========== notification ============ --}}
@if (session()->has('create'))
    <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
        {{session('create') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session()->has('delete'))
    <div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
        {{session('delete') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
{{-- =========== end notification =========== --}}

<div class="container ">
    <div class="col mb-3">
        <a href="/users/create" class="btn btn-success">Tambah Admin</a>
    </div>
    <div class="col-lg-12 ">
        <div class="table-responsive">
            <table class="table  table-striped table-hover table-sm table-bordered">
            <thead class="bg-primary text-light ">
                <tr>
                <th scope="col" class="py-3 text-center">No</th>
                <th scope="col" class="py-3 text-center">Nama User</th>
                <th scope="col" class="py-3 text-center">Username</th>
                <th scope="col" class="py-3 text-center">Email</th>
                <th scope="col" class="py-3 text-center">Created At</th>
                <th scope="col" class="py-3 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $admin)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->username }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>{{ $admin->created_at->diffForHumans() }}</td>
                        <td class="justify-content-center d-flex align-items-center">

                            <form action="/users/{{ $admin->username }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge text-bg-danger border-0  " onclick="return confirm('are you sure?') "><span data-feather="trash"></span></button>
                                
                            </form>
                        </td>
                    </tr>

                @endforeach
            </tbody>
            </table>            
        </div>
        {{ $admins->links() }}
    </div>
</div>
<div class="footer" style="height: 100px"></div>
    @endsection