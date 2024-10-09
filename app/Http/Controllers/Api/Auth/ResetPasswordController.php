<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
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
    public function __invoke(Request $request): JsonResponse
    {

        $request->validate([
            'code' => ['required','exists:clients,code'],
            'phone' => ['required','exists:clients,phone'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $client = Client::wherePhone($request->phone)->first();
        if ($request->code != $client->code)
        {
            throw ValidationException::withMessages([
                'code' => ['The provided credentials are incorrect.'],
            ]);
        }
        $client->update([
            'password' => Hash::make($request->password)
        ]);
        $client->resetCode();
        return responseJson(message: "Password reset successfully");


    }
}
