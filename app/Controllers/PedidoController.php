<?php

namespace App\Controllers;

use App\Models\Pedido;
use App\Helpers\ResponseHelper;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class PedidoController
{
    public function listarPedidos(Request $request, Response $response)
    {
        // Exemplo simples de listagem de pedidos
        $pedidos = Pedido::all();

        // Retornando uma resposta JSON com a lista de pedidos
        return ResponseHelper::withJson($response, $pedidos);
    }

    public function mostrarPedido(Request $request, Response $response, $args)
    {
        $pedidoId = $args['id'];

        // Busca o pedido pelo ID
        $pedido = Pedido::find($pedidoId);

        if (!$pedido) {
            return ResponseHelper::withJson($response, ['error' => 'Pedido não encontrado'], 404);
        }

        // Retornando uma resposta JSON com os detalhes do pedido
        return ResponseHelper::withJson($response, $pedido);
    }

    public function criarPedido(Request $request, Response $response)
    {
        // Exemplo de criação de um novo pedido
        $data = $request->getParsedBody();

        // Validação dos dados recebidos (pode ser feita com um Validator)
        // Exemplo simplificado
        $pedido = new Pedido();
        $pedido->cliente_id = $data['cliente_id']; // Supondo que o pedido está associado a um cliente
        $pedido->total = $data['total'];
        $pedido->status = 'pendente'; // Status inicial do pedido
        $pedido->save();

        // Retornando uma resposta JSON com o pedido criado
        return ResponseHelper::withJson($response, $pedido);
    }

    public function atualizarStatusPedido(Request $request, Response $response, $args)
    {
        $pedidoId = $args['id'];
        $data = $request->getParsedBody();

        // Busca o pedido pelo ID
        $pedido = Pedido::find($pedidoId);

        if (!$pedido) {
            return ResponseHelper::withJson($response, ['error' => 'Pedido não encontrado'], 404);
        }

        // Atualiza o status do pedido
        $pedido->status = $data['status'];
        $pedido->save();

        // Retornando uma resposta JSON com o pedido atualizado
        return ResponseHelper::withJson($response, $pedido);
    }

    public function deletarPedido(Request $request, Response $response, $args)
    {
        $pedidoId = $args['id'];

        // Busca o pedido pelo ID
        $pedido = Pedido::find($pedidoId);

        if (!$pedido) {
            return ResponseHelper::withJson($response, ['error' => 'Pedido não encontrado'], 404);
        }

        // Deleta o pedido
        $pedido->delete();

        // Retornando uma resposta JSON de confirmação
        return ResponseHelper::withJson($response, ['message' => 'Pedido deletado com sucesso']);
    }
}
