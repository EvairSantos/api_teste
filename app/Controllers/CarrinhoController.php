<?php

namespace App\Controllers;

use App\Models\Carrinho;
use App\Helpers\ResponseHelper;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class CarrinhoController
{
    public function adicionarProduto(Request $request, Response $response)
    {
        // Exemplo de adição de um produto ao carrinho
        $data = $request->getParsedBody();

        // Validação dos dados recebidos (pode ser feita com um Validator)
        // Exemplo simplificado
        $carrinho = new Carrinho();
        $carrinho->produto_id = $data['produto_id'];
        $carrinho->quantidade = $data['quantidade'];
        $carrinho->save();

        // Retornando uma resposta JSON com o item adicionado ao carrinho
        return ResponseHelper::withJson($response, $carrinho);
    }

    public function listarItensCarrinho(Request $request, Response $response)
    {
        // Exemplo simples de listagem de itens no carrinho
        $itensCarrinho = Carrinho::all();

        // Retornando uma resposta JSON com os itens do carrinho
        return ResponseHelper::withJson($response, $itensCarrinho);
    }

    public function atualizarQuantidadeItem(Request $request, Response $response, $args)
    {
        $carrinhoId = $args['id'];
        $data = $request->getParsedBody();

        // Busca o item do carrinho pelo ID
        $carrinho = Carrinho::find($carrinhoId);

        if (!$carrinho) {
            return ResponseHelper::withJson($response, ['error' => 'Item do carrinho não encontrado'], 404);
        }

        // Atualiza a quantidade do item no carrinho
        $carrinho->quantidade = $data['quantidade'];
        $carrinho->save();

        // Retornando uma resposta JSON com o item do carrinho atualizado
        return ResponseHelper::withJson($response, $carrinho);
    }

    public function removerItemCarrinho(Request $request, Response $response, $args)
    {
        $carrinhoId = $args['id'];

        // Busca o item do carrinho pelo ID
        $carrinho = Carrinho::find($carrinhoId);

        if (!$carrinho) {
            return ResponseHelper::withJson($response, ['error' => 'Item do carrinho não encontrado'], 404);
        }

        // Deleta o item do carrinho
        $carrinho->delete();

        // Retornando uma resposta JSON de confirmação
        return ResponseHelper::withJson($response, ['message' => 'Item do carrinho removido com sucesso']);
    }
}
