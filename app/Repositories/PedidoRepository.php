<?php

namespace App\Repositories;

use App\Models\Pedido;

class PedidoRepository
{
    public function criar(array $dados)
    {
        return Pedido::create($dados);
    }

    public function atualizar(int $id, array $dados)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->fill($dados);
        $pedido->save();

        return $pedido;
    }

    public function encontrarPorId(int $id)
    {
        return Pedido::findOrFail($id);
    }

    public function listar()
    {
        return Pedido::all();
    }

    public function deletar(int $id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->delete();

        return true;
    }
}
