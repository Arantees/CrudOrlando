<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Café</title>
    <!-- Link para Bootstrap (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Coffee Manager</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('coffees.index') }}">Lista de Cafés</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('coffees.create') }}">Cadastrar Café</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Cadastrar um Novo Café</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulário -->
        <form action="{{ route('coffees.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="type" class="form-label">Nome</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Ex: Melita" value="{{ old('name') }}" required>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Tipo de Café</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Ex: Espresso" value="{{ old('description') }}" required>
            </div>
            <div class="mb-3">
                <label for="brand" class="form-label">Marca</label>
                <input type="text" name="brand" id="brand" class="form-control" placeholder="Ex: Starbucks" value="{{ old('brand') }}" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Imagem do Café</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('home') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
