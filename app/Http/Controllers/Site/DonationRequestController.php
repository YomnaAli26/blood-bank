<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDonationRequest;
use App\Http\Resources\DonationRequestResource;
use App\Services\BloodTypeService;
use App\Services\CityService;
use App\Services\DonationRequestService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use function App\Helpers\responseJson;

class DonationRequestController extends Controller
{
    public function __construct(
        public DonationRequestService $donationRequestService,
        public CityService            $cityService,
        public BloodTypeService       $bloodTypeService)
    {
    }


    public function index(Request $request)
    {
        $donationRequests = $this->donationRequestService->getRequests( relations: ['city','bloodType']);
        $cities = $this->cityService->getCities();
        $bloodTypes = $this->bloodTypeService->getBloodTypes();
        if ($request->ajax()) {
            $filteredRequests = $this->donationRequestService->getRequests(
                filters: $request->only(['blood_type_id', 'city_id']),
                relations: ['city', 'bloodType']
            );
            return response()->json([
                'message' => 'success',
                'requests' => $filteredRequests,
            ]);
        }
        return view("site.donation-requests.index", get_defined_vars());

    }

    public function show($id)
    {
        $donationRequest = $this->donationRequestService->showRequest($id);
        return view("site.donation-requests.show", compact("donationRequest"));

    }



}
