<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;

class ResponseHelper
{
    public static function success($data = null, $statusCode = 200)
    {
        return response()->json([
            'success' => true,
            'data' => $data,
        ], $statusCode);
    }

    public static function error($message, $errorCode, $statusCode = 400)
    {
        return response()->json([
            'success' => false,
            'error' => [
                'code' => $errorCode,
                'message' => $message,
            ],
        ], $statusCode);
    }
}
