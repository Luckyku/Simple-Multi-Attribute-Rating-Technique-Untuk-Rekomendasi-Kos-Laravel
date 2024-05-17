<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container">
        <a class="navbar-brand" href="/home">Skripsi</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{($title === "home") ? "active" : ""}}" aria-current="page" href="/home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{($title === "daftar") ? "active" : ""}}" href="/home#daftar-kos">Daftar Kos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{($title === "rekomendasi") ? "active" : ""}}" href="/home#rekomendasi">Rekomendasi Kos</a>
            </li>
            
            </ul>
            <ul class="navbar-nav ms-auto">   
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-fill"></i>  {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            {{-- <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-window-reverse"></i> Dashboard</a></li> --}}
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-left"></i> Logout</button>
                            </form>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="/login" class="nav-link {{($title === "Login") ? "active" : ""}}"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                    </li>
                @endauth
            </ul>
                

        </div>
        </div>
    </nav>