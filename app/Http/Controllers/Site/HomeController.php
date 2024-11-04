<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Services\BloodTypeService;
use App\Services\CityService;
use App\Services\DonationRequestService;
use App\Services\PostService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(
        public PostService            $postService,
        public DonationRequestService $donationRequestService,
        public BloodTypeService       $bloodTypeService,
        public CityService $cityService,
    )
    {
    }

    public function __invoke(PostRepositoryInterface $postRepository,Request $request)
    {
        $donationRequests = $this->donationRequestService->getRequests(filters: $request->query(),relations: ['city','bloodType']);
        $posts = $this->postService->getPosts();
        $bloodTypes = $this->bloodTypeService->getBloodTypes();
        $cities = $this->cityService->getCities();
        if ($request->ajax()) {
            return response()->json([
                'message'=>'success',
                'requests'=>$donationRequests,
            ]);
        }
        return view('site.home', get_defined_vars());
    }
}
