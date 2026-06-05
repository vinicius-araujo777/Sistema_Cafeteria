<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    
    public function index()
    {
        $fornecedores = Fornecedor::all();
        return view('fornecedores.index', compact('fornecedores'));
    }

    public function create()
    {
        return view('fornecedores.create');
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'required|string|max:15',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|max:2',
        ]);
        Fornecedor::create($dados);

        return redirect()->route('fornecedores.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        return view('fornecedores.edit', compact('fornecedor'));
    }

    public function update(Request $request, string $id)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'required|string|max:15',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|max:2',
        ]);
        $fornecedor = Fornecedor::findOrFail($id);
        $fornecedor->update($dados);

        return redirect()->route('fornecedores.index');
    }

    public function destroy(string $id)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        $fornecedor->delete();

        return redirect()->route('fornecedores.index');
    }
}
