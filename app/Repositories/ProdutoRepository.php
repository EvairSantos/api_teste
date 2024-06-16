<?php

namespace App\Repositories;

use App\Models\Produto;

class ProdutoRepository
{
    public function criar(array $dados)
    {
        return Produto::create($dados);
    }

    public function atualizar(int $id, array $dados)
    {
        $produto = Produto::findOrFail($id);
        $produto->fill($dados);
        $produto->save();

        return $produto;
    }

    public function encontrarPorId(int $id)
    {
        return Produto::findOrFail($id);
    }

    public function listar()
    {
        return Produto::all();
    }

    public function deletar(int $id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();

        return true;
    }
}
