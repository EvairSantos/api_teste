<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
        'nome', 'email', 'telefone', 'endereco', 'senha'
    ];

    // Mutator para criptografar a senha antes de salvar no banco de dados
    public function setSenhaAttribute($value)
    {
        $this->attributes['senha'] = Hash::make($value);
    }

    // Relacionamento com Pedidos (um cliente pode ter vários pedidos)
    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'cliente_id');
    }
}
