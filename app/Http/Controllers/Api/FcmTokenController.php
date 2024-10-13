<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFcmTokenRequest;
use App\Models\FcmToken;
use Illuminate\Http\JsonResponse;
use function App\Helpers\responseJson;

class FcmTokenController extends Controller
{
    public function store(StoreFcmTokenRequest $fcmTokenRequest): JsonResponse
    {
        FcmToken::whereToken($fcmTokenRequest->token)->delete();
        auth()->user()->fcmTokens()->create($fcmTokenRequest->validated());
        return responseJson(message: 'تم التسجيل بنجاح');
    }

    public function destroy(StoreFcmTokenRequest $fcmTokenRequest): JsonResponse
    {
        FcmToken::whereToken($fcmTokenRequest->token)->delete();
        return responseJson(message: 'تم الحذف بنجاح');


    }
}
