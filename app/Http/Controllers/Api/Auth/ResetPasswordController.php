<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Models\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use function App\Helpers\responseJson;

class ResetPasswordController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ResetPasswordRequest $request): JsonResponse
    {

        $client = Client::wherePhone($request->phone)->first();
        if ($request->code != $client->code)
        {
            throw ValidationException::withMessages([
                'code' => ['The provided credentials are incorrect.'],
            ]);
        }
        $client->update([
            'password' => $request->password
        ]);
        $client->resetCode();
        return responseJson(message: "Password reset successfully");


    }
}
