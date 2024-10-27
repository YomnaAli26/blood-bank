<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\DashboardController;
use App\Models\Setting;
use App\Repositories\Interfaces\SettingRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


class SettingController extends DashboardController
{
    public function __construct(SettingRepositoryInterface $settingRepository)
    {
        $this->repository = $settingRepository;
        $this->indexView = 'settings.index';
    }

    public function put(Request $request): RedirectResponse
    {
        $settings = $request->except('_token','_method');
        foreach ($settings as $key => $value) {
            $this->repository->findByKey($key)->update(['value' => $value]);
        }
        Cache::forget('settings');
        Cache::remember('settings', 60, function () {
            return $this->repository->all()->toArray();
        });
        return redirect()->route("{$this->baseFolder}{$this->indexView}")
            ->with('success', $this->successMessage);

    }
}
