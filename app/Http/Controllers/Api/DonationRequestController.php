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
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function App\Helpers\responseJson;

class DonationRequestController extends Controller
{

    public function index(Request $request): JsonResponse
    {
        !empty($request->query()) ? $donationRequests = DonationRequest::filter($request->query())->get()
            : $donationRequests = DonationRequest::all();

        return responseJson(1, "success", DonationRequestResource::collection($donationRequests));
    }

    public function show(DonationRequest $donationRequest): JsonResponse
    {
        return responseJson(1, "success", DonationRequestResource::make($donationRequest));

    }
    public function store(StoreDonationRequest $request): JsonResponse
    {

    }

}
