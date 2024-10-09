<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function App\Helpers\responseJson;

class ProfileController extends Controller
{
    public function __invoke(UpdateProfileRequest $updateProfileRequest,Client $client): JsonResponse
    {
        if (empty($updateProfileRequest->validated())) {
            return responseJson(message: "Client data retrieved successfully",data: $client);
        }
        $client->update($updateProfileRequest->validated());
        return responseJson(message: "Profile updated successfully", data: $client);
    }
}
