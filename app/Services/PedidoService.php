<?php

namespace App\Services;

use App\Models\Pedido;

class PedidoService
{
    public function criarPedido($dados)
    {
        // Validação dos dados (pode ser implementada aqui ou utilizando FormRequest)

        $pedido = Pedido::create($dados);

        return $pedido;
    }

    public function atualizarPedido($id, $dados)
    {
        $pedido = Pedido::find($id);

        if (!$pedido) {
            throw new \Exception('Pedido não encontrado.');
        }

        // Validação dos dados (pode ser implementada aqui ou utilizando FormRequest)

        $pedido->fill($dados);
        $pedido->save();

        return $pedido;
    }

    public function listarPedidos()
    {
        $pedidos = Pedido::all();

        return $pedidos;
    }

    public function mostrarPedido($id)
    {
        $pedido = Pedido::find($id);

        if (!$pedido) {
            throw new \Exception('Pedido não encontrado.');
        }

        return $pedido;
    }

    public function deletarPedido($id)
    {
        $pedido = Pedido::find($id);

        if (!$pedido) {
            throw new \Exception('Pedido não encontrado.');
        }

        $pedido->delete();

        return true;
    }
}
