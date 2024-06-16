<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemPedido extends Model
{
    protected $table = 'itens_pedido';

    protected $fillable = [
        'pedido_id', 'produto_id', 'quantidade', 'preco_unitario'
    ];

    // Relacionamento com Pedido (um item de pedido pertence a um pedido)
    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }

    // Relacionamento com Produto (um item de pedido pertence a um produto)
    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
