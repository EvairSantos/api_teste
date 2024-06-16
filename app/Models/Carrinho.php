<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{
    protected $table = 'carrinho'; // Nome da tabela no banco de dados

    protected $fillable = [
        'cliente_id', 'produto_id', 'quantidade'
    ];

    // Relacionamento com Produto (um item de carrinho pertence a um produto)
    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
