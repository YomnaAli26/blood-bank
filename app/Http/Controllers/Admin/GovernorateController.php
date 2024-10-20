<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\DashboardController;
use App\Http\Requests\StoreGovernorateRequest;
use App\Http\Requests\UpdateGovernorateRequest;
use App\Repositories\Interfaces\GovernorateRepositoryInterface;


class GovernorateController extends DashboardController
{
    public function __construct(GovernorateRepositoryInterface $governorateRepository)
    {
        $this->repositoryInterface = $governorateRepository;
        $this->storeRequestClass = new StoreGovernorateRequest();
        $this->updateRequestClass = new UpdateGovernorateRequest();
        $this->indexView = 'governorates.index';
        $this->createView = 'governorates.create';
        $this->editView = 'governorates.edit';
        $this->showView = 'governorates.show';
        $this->successMessage = 'Process success';
    }

}
