<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __invoke(UpdateProfileRequest $updateProfileRequest,Client $client)
    {
dd($client);
    }
}
