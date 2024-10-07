<?php
namespace App\Helpers;

use Illuminate\Http\JsonResponse;

if (!function_exists('responseJson'))
{
    function responseJson($status = 1, $message = 'success', $data = null): JsonResponse
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data
        ]);
    }
}
