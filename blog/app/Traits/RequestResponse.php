<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

trait RequestResponse
{

    protected function successResponse($message, $data): JsonResponse
    {
        $code = 200;
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ], $code);
    }


    protected function errorResponse($message): JsonResponse
    {
        $code = 400;
        $data = [];
        return response()->json([
            'status' => 'failed',
            'message' => $message,
            'data' => $data
        ], $code);
    }
}