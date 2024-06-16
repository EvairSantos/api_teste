<?php

namespace App\Services;

use App\Models\Produto;

class ProdutoService
{
    public function criarProduto($dados)
    {
        // Validação dos dados (pode ser implementada aqui ou utilizando FormRequest)

        $produto = Produto::create($dados);

        return $produto;
    }

    public function atualizarProduto($id, $dados)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            throw new \Exception('Produto não encontrado.');
        }

        // Validação dos dados (pode ser implementada aqui ou utilizando FormRequest)

        $produto->fill($dados);
        $produto->save();

        return $produto;
    }

    public function listarProdutos()
    {
        $produtos = Produto::all();

        return $produtos;
    }

    public function mostrarProduto($id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            throw new \Exception('Produto não encontrado.');
        }

        return $produto;
    }

    public function deletarProduto($id)
    {
        $produto = Produto::find($id);

        if (!$produto) {
            throw new \Exception('Produto não encontrado.');
        }

        $produto->delete();

        return true;
    }
}
