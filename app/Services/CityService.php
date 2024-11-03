<?php

namespace App\Services;

use App\Repositories\Interfaces\CityRepositoryInterface;

use Illuminate\Http\Request;

class CityService
{
    public function __construct(public CityRepositoryInterface $cityRepository)
    {
    }

    public function getCities()
    {

        return $this->cityRepository->all();
    }

    public function showCity($id)
    {
        return $this->cityRepository->find($id);

    }

}
