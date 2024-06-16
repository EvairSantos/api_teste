<?php

namespace App\Controllers;

use App\Models\Entrega;
use App\Helpers\ResponseHelper;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class EntregaController
{
    public function listarEntregas(Request $request, Response $response)
    {
        // Exemplo simples de listagem de entregas
        $entregas = Entrega::all();

        // Retornando uma resposta JSON com a lista de entregas
        return ResponseHelper::withJson($response, $entregas);
    }

    public function mostrarEntrega(Request $request, Response $response, $args)
    {
        $entregaId = $args['id'];

        // Busca a entrega pelo ID
        $entrega = Entrega::find($entregaId);

        if (!$entrega) {
            return ResponseHelper::withJson($response, ['error' => 'Entrega não encontrada'], 404);
        }

        // Retornando uma resposta JSON com os detalhes da entrega
        return ResponseHelper::withJson($response, $entrega);
    }

    public function criarEntrega(Request $request, Response $response)
    {
        // Exemplo de criação de uma nova entrega
        $data = $request->getParsedBody();

        // Validação dos dados recebidos (pode ser feita com um Validator)
        // Exemplo simplificado
        $entrega = new Entrega();
        $entrega->pedido_id = $data['pedido_id']; // Associando a entrega a um pedido
        $entrega->endereco = $data['endereco'];
        $entrega->status = 'pendente'; // Status inicial da entrega
        $entrega->save();

        // Retornando uma resposta JSON com a entrega criada
        return ResponseHelper::withJson($response, $entrega);
    }

    public function atualizarStatusEntrega(Request $request, Response $response, $args)
    {
        $entregaId = $args['id'];
        $data = $request->getParsedBody();

        // Busca a entrega pelo ID
        $entrega = Entrega::find($entregaId);

        if (!$entrega) {
            return ResponseHelper::withJson($response, ['error' => 'Entrega não encontrada'], 404);
        }

        // Atualiza o status da entrega
        $entrega->status = $data['status'];
        $entrega->save();

        // Retornando uma resposta JSON com a entrega atualizada
        return ResponseHelper::withJson($response, $entrega);
    }

    public function deletarEntrega(Request $request, Response $response, $args)
    {
        $entregaId = $args['id'];

        // Busca a entrega pelo ID
        $entrega = Entrega::find($entregaId);

        if (!$entrega) {
            return ResponseHelper::withJson($response, ['error' => 'Entrega não encontrada'], 404);
        }

        // Deleta a entrega
        $entrega->delete();

        // Retornando uma resposta JSON de confirmação
        return ResponseHelper::withJson($response, ['message' => 'Entrega deletada com sucesso']);
    }
}
