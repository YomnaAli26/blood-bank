<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPassword;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use function App\Helpers\responseJson;
use function App\Helpers\twilioSms;

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

        //Send otp using mail(gmail & mailtrap)
        Mail::to($client->email)
        ->bcc("yomnaali463@gmail.com")
       -> send(new ForgotPassword($client));

        //Send otp using phone(twilio)
        twilioSms($client->phone,"Your Code is $client->code");

        return responseJson(message: "we send otp code on your email");




    }
}
