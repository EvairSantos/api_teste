<?php

namespace App\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class Controller extends BaseController
{
    /**
     * Retorna uma resposta JSON padronizada.
     *
     * @param mixed $data
     * @param int $status
     * @param array $headers
     * @param int $options
     * @return JsonResponse
     */
    protected function jsonResponse($data = null, $status = 200, $headers = [], $options = 0): JsonResponse
    {
        return response()->json($data, $status, $headers, $options);
    }

    /**
     * Retorna uma resposta JSON de erro padronizada.
     *
     * @param string $message
     * @param int $status
     * @param array $headers
     * @param int $options
     * @return JsonResponse
     */
    protected function jsonErrorResponse($message = 'Erro interno', $status = 500, $headers = [], $options = 0): JsonResponse
    {
        return response()->json(['error' => $message], $status, $headers, $options);
    }

    /**
     * Valida uma requisição usando as regras fornecidas.
     *
     * @param Request $request
     * @param array $rules
     * @param array $messages
     * @return void
     */
    protected function validateRequest(Request $request, array $rules, array $messages = [])
    {
        $validator = validator($request->all(), $rules, $messages);

        if ($validator->fails()) {
            $this->throwValidationException($request, $validator);
        }
    }
}
