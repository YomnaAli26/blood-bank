<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\DashboardController;
use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Repositories\Interfaces\CityRepositoryInterface;


class CityController extends DashboardController
{
    public function __construct(CityRepositoryInterface $cityRepository)
    {
        $this->repository = $cityRepository;
        $this->storeRequestClass = new StoreCityRequest();
        $this->updateRequestClass = new UpdateCityRequest();
        $this->indexView = 'cities.index';
        $this->createView = 'cities.create';
        $this->editView = 'cities.edit';
        $this->showView = 'cities.show';
        $this->successMessage = 'Process success';
    }

}
