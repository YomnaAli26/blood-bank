<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function App\Helpers\responseJson;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(RegisterRequest $request)
    {
        $client = Client::create($request->validated());
        $client->governorates()->attach($client->city->governorate_id);
        $client->bloodTypes()->attach($client->blood_type_id);
        $token = $client->createToken($request->email)->plainTextToken;

        return responseJson(data: array_merge(
            ClientResource::make($client)->toArray($request),
            ['token' => $token]
        ));
    }
}
