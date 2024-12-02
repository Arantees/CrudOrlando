<!-- resources/views/coffees/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Café</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="container mt-5">
        <h1 class="text-center">Editar Café</h1>

        <form action="{{ route('coffees.update', $coffee->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $coffee->name) }}" required>
            </div>
            <div class="mb-3">
                <label for="brand" class="form-label">Marca</label>
                <input type="text" class="form-control" id="brand" name="brand" value="{{ old('brand', $coffee->brand) }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Tipo</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $coffee->description) }}" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Imagem</label>
                <input type="file" class="form-control" id="image" name="image">
                @if ($coffee->image)
                    <img src="{{ asset('storage/' . $coffee->image) }}" alt="Imagem do café" class="mt-3" style="width: 100px; height: auto;">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </form>
    </div>
</body>
</html>
