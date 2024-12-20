<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ClientLoginRequest;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use function App\Helpers\responseJson;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     * @throws ValidationException
     */
    public function __invoke(ClientLoginRequest $request): JsonResponse
    {
        $credentials = $request->validated();
        $client = Client::query()->wherePhone($credentials['phone'])->first();
        if (!$client || !Hash::check($credentials['password'], $client->password)) {
            throw ValidationException::withMessages(['phone' => __('auth.failed')]);
        }
        $token = $client->createToken($client->phone)->plainTextToken;
        return responseJson(data: array_merge(
            ClientResource::make($client)->toArray($request),
            ['token' => $token]
        ));

    }
}
