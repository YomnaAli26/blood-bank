<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\DashboardController;
use App\Repositories\Interfaces\SettingRepositoryInterface;


class SettingController extends DashboardController
{
    public function __construct(SettingRepositoryInterface $settingRepository)
    {
        $this->repository = $settingRepository;
        $this->indexView = 'settings.index';
    }

    public function update(\Illuminate\Http\Request $request, $id)
    {
        dd($request->all());
    }
}
