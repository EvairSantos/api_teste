<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;

class PedidoValidator
{
    public static function validate(array $data)
    {
        $rules = [
            'cliente_id' => 'required|exists:clientes,id',
            'status' => 'required|in:pendente,processando,enviado,entregue,cancelado',
        ];

        $messages = [
            'cliente_id.required' => 'O campo cliente_id é obrigatório.',
            'cliente_id.exists' => 'O cliente informado não existe.',
            'status.required' => 'O campo status é obrigatório.',
            'status.in' => 'O status informado é inválido.',
        ];

        return Validator::make($data, $rules, $messages);
    }
}
