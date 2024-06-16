<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    protected $table = 'entregas';

    protected $fillable = [
        'pedido_id', 'data_entrega', 'status', 'endereco_entrega'
    ];

    // Relacionamento com Pedido (uma entrega pertence a um pedido)
    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }
}
