<?php

namespace App\Http\Traits;

use Illuminate\Http\JsonResponse;

trait ResponserTrait
{
    protected function successResponse($data, $message, int $httpResponseCode = 200, ): JsonResponse
    {
        return response()->json([
            'status'    => "success",
            'message'    => $message,
            'data'       => $data,
        ], $httpResponseCode);
    }

    protected function errorResponse(string $message, ?array $errors = [], int $httpResponseCode = 400): JsonResponse {
        return response()->json([
            'success'    => false,
            'message'    => $message ?? null,
            'errors'     => $errors ?? null,
        ], $httpResponseCode);
    }
}
