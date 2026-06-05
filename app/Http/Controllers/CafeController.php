<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cafe;
use App\Models\Categoria;

class CafeController extends Controller
{
    public function index()
    {
        $cafes = Cafe::all();
        return view('cafes.index', compact('cafes'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('cafes.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'torra' => 'required|in:clara,media,escura',
            'preco_por_kg' => 'required|numeric|min:0',
            'estoque_kg' => 'required|numeric|min:0',
        ]);
        Cafe::create($dados);

        return redirect()->route('cafes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $cafe = Cafe::findOrFail($id);
        $categorias = Categoria::all();
        return view('cafes.edit', compact('cafe', 'categorias'));
    }

    public function update(Request $request, string $id)
    {
        $dados = $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'torra' => 'required|in:clara,media,escura',
            'preco_por_kg' => 'required|numeric|min:0',
            'estoque_kg' => 'required|numeric|min:0',
        ]);
        $cafe = Cafe::findOrFail($id);
        $cafe->update($dados);

        return redirect()->route('cafes.index');
    }

    public function destroy(string $id)
    {
        $cafe = Cafe::findOrFail($id);
        $cafe->delete();

        return redirect()->route('cafes.index');
    }
}
