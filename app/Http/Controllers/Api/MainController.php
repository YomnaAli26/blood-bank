<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\StoreNotificationSettingsRequest;
use App\Http\Resources\{BloodTypeResource, CategoryResource, CityResource, GovernorateResource, PostResource};
use App\Models\{BloodType, Client, Post, Setting, Governorate, Contact, City, Category};
use Illuminate\Http\{JsonResponse, Request};
use Illuminate\Support\Facades\Cache;
use function App\Helpers\responseJson;

class MainController extends Controller
{

    public function governorates(): JsonResponse
    {
        $governorates = Governorate::all();
        return responseJson(1, "success", GovernorateResource::collection($governorates));

    }

    public function cities(Request $request): JsonResponse
    {
        $cities =City::filter($request->query())->get();
        return responseJson(1, "success", CityResource::collection($cities));

    }

    public function categories(): JsonResponse
    {
        $categories = Category::all();
        return responseJson(1, "success", CategoryResource::collection($categories));

    }

    public function settings(): JsonResponse
    {
        $settings = Cache::remember('settings', 3600, function () {
            return Setting::query()->pluck('value', 'key')->toArray();
        });
        return responseJson(data: $settings);

    }

    public function bloodTypes(): JsonResponse
    {
        $bloodTypes = Cache::remember('bloodTypes', 60 * 60, function () {
            return BloodType::all();
        });
        return responseJson(1, "success", BloodTypeResource::collection($bloodTypes));
    }

    public function getClientGovernorates(): JsonResponse
    {
        $clientGovernorates = auth()->user()->governorates()->get();
        return responseJson(1, "success", GovernorateResource::collection($clientGovernorates));
    }

    public function getClientBloodTypes(): JsonResponse
    {
        $clientBloodTypes = auth()->user()->bloodTypes()->get();
        return responseJson(1, "success", GovernorateResource::collection($clientBloodTypes));
    }



    public function contactUs(StoreContactRequest $request): JsonResponse
    {
        $request->user()->contacts()->create($request->validated());
        return responseJson(message: "Message has been sent");

    }


}
