<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';

    protected $fillable = [
        'nome', 'descricao', 'preco', 'quantidade_em_estoque'
    ];

    // Relacionamento com Itens do Pedido (um produto pode estar em vários pedidos)
    public function itensPedido()
    {
        return $this->hasMany(ItemPedido::class, 'produto_id');
    }
}
