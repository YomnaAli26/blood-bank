<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'phone' => ['required','exists:clients,phone'],
        ]);
        $client = Client::query()->wherePhone($request->phone)->first();
        $client->generateCode();
    }
}
