<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use App\Models\Categoria;
use App\Models\Fornecedor;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCafes       = Cafe::count();
        $totalCategorias  = Categoria::count();
        $totalFornecedores = Fornecedor::count();
        $ultimosCafes     = Cafe::with('categoria')->latest()->take(5)->get();

        return view('dashboard', compact(
            'totalCafes',
            'totalCategorias',
            'totalFornecedores',
            'ultimosCafes'
        ));
    }
}