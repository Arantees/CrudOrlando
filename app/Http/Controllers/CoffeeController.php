<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\CoffeeRequest;

class CoffeeController extends Controller
{
    // Exibe a lista de cafés
    public function index()
    {
        $coffees = Coffee::orderBy('id')->get(); // Obtém todos os cafés
        Log::error('Erro de teste no Laravel!');
        return view('coffees.index', compact('coffees'));
    }

    // Exibe o formulário para criar um novo café
    public function create()
    {
        return view('coffees.create');
    }

    public function store(CoffeeRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('images'), $imageName);

            $data['image'] = 'images/' . $imageName;
        }

        Coffee::create($data);

        return redirect()->route('coffees.index')->with('success', 'Café cadastrado com sucesso!');
    }

    // Exibe o formulário para editar um café existente
    public function edit(Coffee $coffee)
    {
        return view('coffees.edit', compact('coffee'));
    }

    // Atualiza os dados de um café existente
    public function update(CoffeeRequest $request, Coffee $coffee)
    {
        // Valida os dados da requisição
        $data = $request->validated();

        // Verifica se a requisição contém uma nova imagem
        if ($request->hasFile('image')) {
            // Apaga a imagem antiga se existir
            if ($coffee->image && file_exists(public_path($coffee->image))) {
                unlink(public_path($coffee->image)); // Deleta a imagem antiga
            }

            // Salva a nova imagem
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Verifica se o diretório de imagens existe, se não, cria
            $imagePath = public_path('images');
            if (!file_exists($imagePath)) {
                mkdir($imagePath, 0755, true); // Cria o diretório se ele não existir
            }

            // Move a nova imagem para o diretório
            $image->move($imagePath, $imageName);
            $data['image'] = 'images/' . $imageName;
        }

        // Atualiza os dados do café no banco
        $coffee->update($data);

        // Redireciona para a página de listagem com mensagem de sucesso
        return redirect()->route('coffees.index')->with('success', 'Café atualizado com sucesso!');
    }
    // Remove um café do banco de dados
    public function destroy(Coffee $coffee)
    {
        // Apaga a imagem do café se existir
        if ($coffee->image && file_exists(public_path($coffee->image))) {
            unlink(public_path($coffee->image));
        }

        // Deleta o café do banco de dados
        $coffee->delete();

        return redirect()->route('coffees.index')->with('success', 'Café deletado com sucesso!');
    }
}
