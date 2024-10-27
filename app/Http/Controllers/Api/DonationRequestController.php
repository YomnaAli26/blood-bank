<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDonationRequest;
use App\Http\Resources\DonationRequestResource;
use App\Models\Client;
use App\Models\DonationRequest;
use App\Models\FcmToken;
use App\Notifications\DonationRequestNotification;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use function App\Helpers\responseJson;

class DonationRequestController extends Controller
{

    public function index(Request $request): JsonResponse
    {
        $donationRequests = DonationRequest::filter($request->query())->paginate(10);

        return responseJson(1, "success", DonationRequestResource::collection($donationRequests));
    }

    public function show(DonationRequest $donationRequest): JsonResponse
    {
        return responseJson(1, "success", DonationRequestResource::make($donationRequest));

    }

    public function store(StoreDonationRequest $donationRequest)
    {
        $donationRequest = $donationRequest->user()->donationRequests()->create($donationRequest->validated());
        $clients = Client::whereHas('governorates', function ($query) use ($donationRequest) {
            $query->where('governorate_id', $donationRequest->city->governorate_id);
        })->whereHas('bloodTypes', function ($query) use ($donationRequest) {
            $query->where('blood_type_id', $donationRequest->bloodType->id);
        })->get();
        $clientsIds = $clients->pluck('id')->toArray();
        if (count($clientsIds)) {
            DB::beginTransaction();
            try {
                $notification = $donationRequest->notifications()->create([
                    'title' => 'يوجد حالة تبرع قريبة منك.',
                    'content' => $donationRequest->bloodType->name . ' اريد متبرع لفصيلة دم',
                ]);
                $notification->clients()->attach($clientsIds);

                Notification::send($clients, new DonationRequestNotification($donationRequest));
                DB::commit();
            } catch (\Exception $exception) {
                DB::rollBack();
                return responseJson(0, $exception->getMessage());
            }


        }
    }

}
