<?php
namespace App\Helpers;

use Illuminate\Http\JsonResponse;

if (!function_exists('responseJson'))
{
    function responseJson($status, $message, $data = null): JsonResponse
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data
        ]);
    }
}
