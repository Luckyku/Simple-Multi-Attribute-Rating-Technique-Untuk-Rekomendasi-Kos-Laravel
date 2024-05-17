
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow ">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-uppercase" href="/dashboard">skripsi</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    {{-- <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search"  disabled> --}}

    <div class="navbar-nav">
        <form action="/logout" method="POST">
            @csrf
        <div class="nav-item text-nowrap">        
            <button class="nav-link px-3 btn btn-dark " type="submit"> <span data-feather="log-out" ></span>Log Out</button>
        </div>
        </form>
    </div>
    
    
</header>