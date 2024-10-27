<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\DashboardController;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Repositories\Interfaces\AdminRepositoryInterface;


class AdminController extends DashboardController
{
    public function __construct(AdminRepositoryInterface $adminRepository)
    {
        $this->repository = $adminRepository;
        $this->storeRequestClass = new StoreAdminRequest();
        $this->updateRequestClass = new UpdateAdminRequest();
        $this->indexView = 'admins.index';
        $this->createView = 'admins.create';
        $this->editView = 'admins.edit';
        $this->successMessage = 'Process success';
    }

}
