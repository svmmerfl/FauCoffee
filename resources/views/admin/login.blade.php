<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin - FauCoffee</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/logo-icon.svg') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="{{ asset('css/faucoffee.css') }}" rel="stylesheet">
</head>
<body style="background:linear-gradient(135deg,#2b1d14,#3d2a1d);min-height:100vh" class="d-flex align-items-center">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-11 col-sm-8 col-md-5 col-lg-4">
            <div class="stat p-4 p-md-5 text-center">
                <img src="{{ asset('images/logo-icon.svg') }}" width="84" height="84" alt="Logo FauCoffee" class="mb-3">
                <h3>Login Admin</h3>
                <p class="text-muted small mb-4">Masukkan password untuk mengelola FauCoffee.</p>

                @if(session('error'))<div class="alert alert-warning py-2 small">{{ session('error') }}</div>@endif

                <form action="{{ route('admin.login.post') }}" method="POST" class="text-start">
                    @csrf
                    <label class="form-label">Password</label>
                    <input type="password" name="password" autofocus class="form-control mb-1 @error('password') is-invalid @enderror">
                    @error('password')<div class="invalid-feedback d-block mb-2">{{ $message }}</div>@enderror
                    <button class="btn btn-caramel w-100 mt-3">Masuk</button>
                </form>
                <a href="{{ route('home') }}" class="d-block mt-3 small text-decoration-none text-caramel">&larr; Kembali ke website</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
