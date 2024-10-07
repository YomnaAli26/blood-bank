<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\Category;
use App\Models\City;
use App\Models\Governorate;
use App\Models\Setting;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use function App\Helpers\responseJson;

class MainController extends Controller
{
    public function governorates(): JsonResponse
    {
        $governorates = Governorate::all();
        return responseJson(1, "success", $governorates);

    }

    public function cities(Request $request): JsonResponse
    {
        $cities = City::where(function ($query) use ($request) {
            if ($request->has('governorate_id')) {
                $query->where('governorate_id', $request->query('governorate_id'));
            }
        })->get();
        return responseJson(1, "success", $cities);

    }

    public function settings(): JsonResponse
    {
        $settings = Setting::query()->pluck('value', 'key')->toArray();
        return responseJson(1, "success", $settings);

    }
    public function bloodTypes(): JsonResponse
    {
        $bloodTypes = BloodType::all();
        return responseJson(1, "success", $bloodTypes);
    }


}
