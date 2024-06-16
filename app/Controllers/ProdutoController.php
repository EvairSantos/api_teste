<?php

namespace App\Controllers;

use App\Models\Produto;
use App\Helpers\ResponseHelper;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ProdutoController
{
    public function listarProdutos(Request $request, Response $response)
    {
        // Exemplo simples de listagem de produtos
        $produtos = Produto::all();

        // Retornando uma resposta JSON com a lista de produtos
        return ResponseHelper::withJson($response, $produtos);
    }

    public function mostrarProduto(Request $request, Response $response, $args)
    {
        $produtoId = $args['id'];

        // Busca o produto pelo ID
        $produto = Produto::find($produtoId);

        if (!$produto) {
            return ResponseHelper::withJson($response, ['error' => 'Produto não encontrado'], 404);
        }

        // Retornando uma resposta JSON com os detalhes do produto
        return ResponseHelper::withJson($response, $produto);
    }

    public function criarProduto(Request $request, Response $response)
    {
        // Exemplo de criação de um novo produto
        $data = $request->getParsedBody();

        // Validação dos dados recebidos (pode ser feita com um Validator)
        // Exemplo simplificado
        $produto = new Produto();
        $produto->nome = $data['nome'];
        $produto->preco = $data['preco'];
        $produto->descricao = $data['descricao'];
        $produto->save();

        // Retornando uma resposta JSON com o produto criado
        return ResponseHelper::withJson($response, $produto);
    }

    public function atualizarProduto(Request $request, Response $response, $args)
    {
        $produtoId = $args['id'];
        $data = $request->getParsedBody();

        // Busca o produto pelo ID
        $produto = Produto::find($produtoId);

        if (!$produto) {
            return ResponseHelper::withJson($response, ['error' => 'Produto não encontrado'], 404);
        }

        // Atualiza os dados do produto
        $produto->nome = $data['nome'];
        $produto->preco = $data['preco'];
        $produto->descricao = $data['descricao'];
        $produto->save();

        // Retornando uma resposta JSON com o produto atualizado
        return ResponseHelper::withJson($response, $produto);
    }

    public function deletarProduto(Request $request, Response $response, $args)
    {
        $produtoId = $args['id'];

        // Busca o produto pelo ID
        $produto = Produto::find($produtoId);

        if (!$produto) {
            return ResponseHelper::withJson($response, ['error' => 'Produto não encontrado'], 404);
        }

        // Deleta o produto
        $produto->delete();

        // Retornando uma resposta JSON de confirmação
        return ResponseHelper::withJson($response, ['message' => 'Produto deletado com sucesso']);
    }
}
