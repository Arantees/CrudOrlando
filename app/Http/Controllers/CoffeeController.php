<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use App\Http\Requests\CoffeeRequest;

class CoffeeController extends Controller
{
    // Exibe a lista de cafés
    public function index()
    {
        $coffees = Coffee::all(); // Obtém todos os cafés
        return view('coffees.index', compact('coffees'));
    }

    // Exibe o formulário para criar um novo café
    public function create()
    {
        return view('coffees.create');
    }

    // Armazena um novo café no banco de dados
    public function store(CoffeeRequest $request)
    {
        $data = $request->validated(); // Valida os dados usando o CoffeeRequest

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('public/coffees'); // Armazena a imagem
        }

        Coffee::create($data); // Cria o café no banco de dados

        return redirect()->route('coffees.index')->with('success', 'Café adicionado com sucesso!');
    }

    // Exibe o formulário para editar um café existente
    public function edit(Coffee $coffee)
    {
        return view('coffees.edit', compact('coffee'));
    }

    // Atualiza os dados de um café existente
    public function update(CoffeeRequest $request, Coffee $coffee)
    {
        $data = $request->validated(); // Valida os dados usando o CoffeeRequest

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('public/coffees'); // Armazena a imagem
        }

        $coffee->update($data); // Atualiza o café no banco de dados

        return redirect()->route('coffees.index')->with('success', 'Café atualizado com sucesso!');
    }

    // Remove um café do banco de dados
    public function destroy(Coffee $coffee)
    {
        $coffee->delete(); // Deleta o café do banco de dados

        return redirect()->route('coffees.index')->with('success', 'Café removido com sucesso!');
    }
}
