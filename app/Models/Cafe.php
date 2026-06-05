<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cafe extends Model
{
    protected $fillable = ['categoria_id', 'nome', 'descricao','torra', 'preco_por_kg', 'estoque_kg'];

    protected $casts = [
        'preco_por_kg' => 'decimal:2',
        'estoque_kg'   => 'decimal:3',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
