<?php

namespace App\Repositories;

use App\Models\Entrega;

class EntregaRepository
{
    public function criar(array $dados)
    {
        return Entrega::create($dados);
    }

    public function atualizar(int $id, array $dados)
    {
        $entrega = Entrega::findOrFail($id);
        $entrega->fill($dados);
        $entrega->save();

        return $entrega;
    }

    public function encontrarPorId(int $id)
    {
        return Entrega::findOrFail($id);
    }

    public function listar()
    {
        return Entrega::all();
    }

    public function deletar(int $id)
    {
        $entrega = Entrega::findOrFail($id);
        $entrega->delete();

        return true;
    }
}
