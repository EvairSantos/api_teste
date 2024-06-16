<?php

namespace App\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Helpers\ResponseHelper;

class ClienteController
{
    public function listarClientes(Request $request)
    {
        // Exemplo simples de listagem de clientes
        $clientes = Cliente::all();

        // Retornando uma resposta JSON com a lista de clientes
        return response()->json($clientes);
    }

    public function criarCliente(Request $request)
    {
        // Exemplo de criação de um novo cliente
        $data = $request->all();

        // Validação dos dados recebidos (pode ser feita com um Validator)
        $cliente = new Cliente();
        $cliente->nome = $data['nome'];
        $cliente->email = $data['email'];
        $cliente->save();

        // Retornando uma resposta JSON com o cliente criado
        return response()->json($cliente);
    }

    public function atualizarCliente(Request $request, $id)
    {
        $data = $request->all();

        // Busca o cliente pelo ID
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return response()->json(['error' => 'Cliente não encontrado'], 404);
        }

        // Atualiza os dados do cliente
        $cliente->nome = $data['nome'];
        $cliente->email = $data['email'];
        $cliente->save();

        // Retornando uma resposta JSON com o cliente atualizado
        return response()->json($cliente);
    }

    public function deletarCliente($id)
    {
        // Busca o cliente pelo ID
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return response()->json(['error' => 'Cliente não encontrado'], 404);
        }

        // Deleta o cliente
        $cliente->delete();

        // Retornando uma resposta JSON de confirmação
        return response()->json(['message' => 'Cliente deletado com sucesso']);
    }
}
