<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDonationRequest;
use App\Http\Resources\DonationRequestResource;
use App\Services\DonationRequestService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use function App\Helpers\responseJson;

class DonationRequestController extends Controller
{
public function __construct(public DonationRequestService  $donationRequestService)
{
}

    public function index(Request $request): JsonResponse
    {
        $donationRequests = $this->donationRequestService->getRequests($request->query());
        return responseJson(1, "success", DonationRequestResource::collection($donationRequests));
    }

    public function show($id): JsonResponse
    {
        $donationRequest = $this->donationRequestService->showRequest($id);
        return responseJson(1, "success", DonationRequestResource::make($donationRequest));

    }

    public function store(StoreDonationRequest $donationRequest)
    {

        $result = $this->donationRequestService->storeRequest($donationRequest);
        if (!$result['status'])
        {
            return responseJson(0, message: $result['message']);
        }
        else
        {
            return responseJson(1, "Donation request created successfully", $result['data']);

        }
    }

}
