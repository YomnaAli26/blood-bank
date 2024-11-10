<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Models\City;
use App\Models\Governorate;
use App\Repositories\Interfaces\ContactRepositoryInterface;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Services\BloodTypeService;
use App\Services\CityService;
use App\Services\DonationRequestService;
use App\Services\PostService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MainController extends Controller
{


    public function cities(Governorate $governorate): JsonResponse
    {
        $cities = City::query()->whereBelongsTo($governorate)->get();
        return response()->json([
            'message' => 'success',
            'data' => $cities
        ]);
    }

    public function contactUs(StoreContactRequest $request): JsonResponse
    {
        // Store the contact message
        auth()->user()->contacts()->create($request->validated());

        // Flash success message to the session
        session()->flash('success', 'Your message has been sent successfully!');

        // Return success response
        return response()->json([
            'status' => 'success',
            'message' => session('success')  // Include the flashed message in the response
        ]);
    }

}
