<?php

namespace App\Services;

use App\Models\Entrega;

class EntregaService
{
    public function criarEntrega($dados)
    {
        // Validação dos dados (pode ser implementada aqui ou utilizando FormRequest)

        $entrega = Entrega::create($dados);

        return $entrega;
    }

    public function atualizarEntrega($id, $dados)
    {
        $entrega = Entrega::find($id);

        if (!$entrega) {
            throw new \Exception('Entrega não encontrada.');
        }

        // Validação dos dados (pode ser implementada aqui ou utilizando FormRequest)

        $entrega->fill($dados);
        $entrega->save();

        return $entrega;
    }

    public function listarEntregas()
    {
        $entregas = Entrega::all();

        return $entregas;
    }

    public function mostrarEntrega($id)
    {
        $entrega = Entrega::find($id);

        if (!$entrega) {
            throw new \Exception('Entrega não encontrada.');
        }

        return $entrega;
    }

    public function deletarEntrega($id)
    {
        $entrega = Entrega::find($id);

        if (!$entrega) {
            throw new \Exception('Entrega não encontrada.');
        }

        $entrega->delete();

        return true;
    }
}
