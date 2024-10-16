<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\DashboardController;
use App\Http\Requests\StoreGovernorateRequest;
use App\Repositories\Interfaces\GovernorateRepositoryInterface;


class GovernorateController extends DashboardController
{
    public function __construct(GovernorateRepositoryInterface $governorateRepository)
    {
        $this->repositoryInterface = $governorateRepository;
        $this->storeRequestClass = new StoreGovernorateRequest();
        $this->indexView = 'governorates.index';
        $this->createView = 'governorates.create';
        $this->editView = 'governorates.edit';
        $this->successMessage = 'Process success';
    }

}
