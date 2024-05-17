<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $webTitle }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">



    
    <!-- Custom styles for this template -->
    <link href="/css/login.css" rel="stylesheet">
</head>
<body>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center" >
                <div class="featured-image">
                    <img src="/img/login.jpg" class="img-fluid" style="width: 350px">
                </div>
            </div>

            <div class="col-md-6">
                <main class="form-signin w-100 m-auto">
                    @if (session()->has('registeration'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('registeration') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session()->has('loginFail'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('loginFail') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                <form action="/login" method="POST">
                    @csrf
                    
                    <h1 class="h3 mb-3 fw-norma text-center">Please Log In</h1>

                    <div class="form-floating">
                    <input type="email" class="form-control @error('email')
                        is-invalid
                    @enderror" name="email" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                    <label for="email">Email address</label>
                    @error('email')
                        <div class="invalid-feedback mb-2">{{ $message }}</div>
                    @enderror

                    </div>
                    <div class="form-floating">
                    <input type="password" class="form-control @error('password')
                        is-invalid
                    @enderror" name="password" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                    @error('password')
                        
                        <div class="invalid-feedback">Please check your password</div>
                    @enderror
                    </div>
                    
                    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Log in</button>
                </form>

                <small class="d-block mt-5 text-muted">Not registered yet? please <a href="/register">register here.</a></small>
                </main>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
