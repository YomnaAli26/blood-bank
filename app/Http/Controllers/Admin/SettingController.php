<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\DashboardController;
use App\Models\Setting;
use App\Repositories\Interfaces\SettingRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


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
            $this->repositoryInterface->findByKey($key)->update(['value' => $value]);
        }
        return redirect()->route("{$this->baseFolder}{$this->indexView}")
            ->with('success', $this->successMessage);

    }
}
