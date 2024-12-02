<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Lista de Cafés</title>
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        />
    </head>
    <body>
        <div class="container mt-5">
            <h1 class="text-center">Lista de Cafés</h1>
            <div class="text-end mb-3">
                <a href="{{ route('coffees.create') }}" class="btn btn-primary"
                    >Adicionar Café</a
                >
            </div>

            @if (session('success'))
            <div class="alert alert-success">
                {{ session("success") }}
            </div>
            @endif

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Logotipo</th>
                        <th>Marca</th>
                        <th>Tipo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($coffees as $coffee)
                    <tr>
                        <td>{{ $coffee->id }}</td>
                        <td>
                            @if ($coffee->image)
                            <img
                                src="{{ asset($coffee->image) }}"
                                alt="Imagem do café"
                                style="width: 100px; height: auto"
                            />
                            @else
                            <img
                                src="{{ asset('images/imagemPadrao.jpg') }}"
                                alt="Imagem padrão"
                                style="width: 100px; height: auto"
                            />
                            @endif
                        </td>

                        <td>{{ $coffee->brand }}</td>
                        <td>{{ $coffee->description}}</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-info">Ver</a>
                            <a href="{{ route('coffees.edit', $coffee->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form
                                action="{{ route('coffees.destroy', $coffee->id) }}"
                                method="POST"
                                class="d-inline"
                            >
                                @csrf @method('DELETE')
                                <button
                                    type="submit"
                                    class="btn btn-sm btn-danger"
                                >
                                    Deletar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">
                            Nenhum café cadastrado!
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </body>
</html>
