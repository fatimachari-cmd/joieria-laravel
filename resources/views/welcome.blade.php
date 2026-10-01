<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Joieria</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-light">
    <nav class="navbar navbar-light bg-white border-bottom">
        <div class="container">
            <span class="navbar-brand">Joieria</span>
            <div>
                <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-sm me-2">Iniciar sessió</a>
                <a href="{{ route('register') }}" class="btn btn-secondary btn-sm">Registrar-se</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="text-center mb-4">
            <h2>La nostra col·lecció</h2>
            <p class="text-muted">Descobreix les nostres joies artesanals fetes amb els millors materials.</p>
            <div class="mt-3">
                <a href="{{ route('producte.index') }}" class="btn btn-dark me-2">Veure productes</a> 
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <img src="https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?w=600" class="img-fluid rounded" alt="Joies">
            </div>
        </div>
    </div>

    

</body>
</html>