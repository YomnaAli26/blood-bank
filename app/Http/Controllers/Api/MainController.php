<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\StoreNotificationsSettingsRequest;
use App\Http\Resources\{BloodTypeResource, CategoryResource, CityResource, GovernorateResource};
use App\Models\{BloodType,Setting,Governorate,Contact,City,Category};
use Illuminate\Http\{JsonResponse,Request};
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
        $query = City::query();
        if ($request->has('governorate_id')) {
            $query->where('governorate_id', $request->get('governorate_id'));
        }
        $cities = $query->get();
        return responseJson(1, "success", CityResource::collection($cities));

    }
    public function categories(): JsonResponse
    {
        $categories =Category::all();
        return responseJson(1, "success",CategoryResource::collection($categories));

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

    public function notificationsSettings(StoreNotificationsSettingsRequest $notificationsSettingsRequest): JsonResponse
    {
        $notificationsSettingsRequest->user()->governorates()
            ->sync($notificationsSettingsRequest->governorates);

        $notificationsSettingsRequest->user()->bloodTypes()
            ->sync($notificationsSettingsRequest->blood_types);
        return responseJson(message: "Notifications settings have been updated");

    }

    public function contactUs(StoreContactRequest $request): JsonResponse
    {
        $request->merge(['client_id' => auth()->user()->id]);
        Contact::create($request->validated());
        return responseJson(message: "Message has been sent");

    }

}
