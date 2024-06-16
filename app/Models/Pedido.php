<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';

    protected $fillable = [
        'cliente_id', 'status'
    ];

    // Relacionamento com Cliente (um pedido pertence a um cliente)
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    // Relacionamento com Itens do Pedido (um pedido pode ter vários itens)
    public function itensPedido()
    {
        return $this->hasMany(ItemPedido::class, 'pedido_id');
    }

    // Relacionamento com Entregas (um pedido pode ter uma entrega)
    public function entrega()
    {
        return $this->hasOne(Entrega::class);
    }
}
