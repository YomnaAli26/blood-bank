<?php
namespace App\Helpers;

use Illuminate\Http\JsonResponse;
use Twilio\Exceptions\ConfigurationException;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Client;

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

    /**
     * @throws ConfigurationException
     * @throws TwilioException
     */
    function twilioSms($to, $message): void
    {
       $client =  new Client(config('services.twilio.account_sid'), config('services.twilio.auth_token'));
       $client->messages->create($to,[
           'from' => config('services.twilio.from'),
           'body' => $message
       ]);

    }

}
