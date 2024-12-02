<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Coffee Manager</title>
    <!-- Link para Bootstrap (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Coffee Manager</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('coffees.index') }}">Lista de Cafés</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('coffees.create') }}">Cadastrar Café</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Conteúdo Principal -->
    <div class="container text-center mt-5">
        <h1 class="display-4">Bem-vindo ao Coffee Manager</h1>
        <p class="lead">Gerencie seus cafés favoritos com facilidade!</p>
        <img src={{ asset('images/Coffee.jpg') }} alt="Café" class="img-fluid rounded mt-3">
        <p class="mt-4">
            <a href="{{ route('coffees.create') }}" class="btn btn-primary btn-lg">Cadastrar um Novo Café</a>
        </p>
    </div>

    <!-- Link para Bootstrap JS (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
