<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        
        <ul class="nav flex-column">
        
        </ul>

    @can('admin')        
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"><span>Administrator</span></h6>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link text-capitalize {{ Request::is('dashboard*') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
            </a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link text-capitalize {{ Request::is('rekomendasi-kos*') ? 'active' : '' }}" aria-current="page" href="/rekomendasi-kos">
            <span data-feather="bar-chart-2" class="align-text-bottom"></span>
            Rekomendasi Kos
            </a>
        </li>    --}}
        {{-- <li class="nav-item">
            <a class="nav-link {{ Request::is('data-alternatif*') ? 'active': '' }}" aria-current="page" href="/data-alternatif">
            <span data-feather="file-text" class="align-text-bottom"></span>
            Data Alternatif
            </a>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link {{ Request::is('data-kriteria*') ? 'active': '' }}" aria-current="page" href="/data-kriteria">
            <span data-feather="file-text" class="align-text-bottom"></span>
            Data Kriteria
            </a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link {{ Request::is('data-perhitungan*') ? 'active': '' }}" aria-current="page" href="/data-perhitungan">
            <span data-feather="file-text" class="align-text-bottom"></span>
            Data Perhitungan
            </a>
        </li> --}}
        <li class="nav-item"><a class="nav-link text-capitalize {{ Request::is('users*') ? 'active' : '' }}" aria-current="page" href="/users">
            <span data-feather="user" class="align-text-bottom"></span>
            Users
        </a></li>


    </ul>
    @endcan
    </div>
</nav>