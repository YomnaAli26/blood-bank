<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDonationRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Resources\DonationRequestResource;
use App\Http\Resources\PostResource;
use App\Models\Client;
use App\Models\DonationRequest;
use App\Models\Post;
use App\Notifications\DonationRequestNotification;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

        $clientsIds = $donationRequest->city->governorate
            ->clients()
            ->whereHas('bloodTypes', function ($query) use ($donationRequest) {
                $query->where('blood_types.id', $donationRequest->blood_type_id);
            })
            ->pluck('clients.id')->toArray();
        if (count($clientsIds))
        {
            $notification = $donationRequest->notifications()->create([
               'title'=>'يوجد حالة تبرع قريبة منك.',
               'content'=>$donationRequest->bloodType->name.' اريد متبرع لفصيلة دم',
            ]);
            $notification->clients()->attach($clientsIds);
            $donationRequest->user()->notify(new DonationRequestNotification($donationRequest));

        }
    }

}
