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
                <main class="form-registeration w-100 m-auto">
                <form action="/register" method="POST">
                    @csrf
                    <h1 class="h3 mb-5 fw-normal text-center">Please Register</h1>

                    <div class="form-floating">
                    <input type="text" class="form-control rounded-top @error('name')
                        is-invalid
                    @enderror" name="name" id="name" placeholder="Name" value="{{ old('name') }}">
                    <label for="floatingInput">Name</label>
                    @error('name')
                        <div for="name" class="invalid-feedback mb-2">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="form-floating">
                    <input type="text" class="form-control @error('username')
                        is-invalid
                    @enderror" name="username" id="username" placeholder="Username" value="{{ old('username') }}">
                    <label for="floatingInput">Username</label>
                    @error('username')
                        <div for="username" class="invalid-feedback mb-2">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="form-floating">
                    <input type="email" class="form-control @error('email')
                        is-invalid
                    @enderror" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
                    <label for="floatingInput">Email address</label>
                    @error('email')
                        <div for="email" class="invalid-feedback mb-2">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="form-floating">
                    <input type="password" class="form-control rounded-bottom @error('password')
                        is-invalid
                    @enderror" name="password" id="password" placeholder="Password" >
                    <label for="floatingPassword">Password</label>
                    @error('password')
                        <div class="invalid-feedback">Please check your password</div>
                    @enderror
                    </div>
                    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
                </form>
                
                <small class="d-block mt-5 text-muted">Already registered? <a href="/login">Login here.</a></small>
                </main>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
