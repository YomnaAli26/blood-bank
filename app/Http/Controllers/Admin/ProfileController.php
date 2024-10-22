<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\DashboardController;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Repositories\Eloquent\AdminRepository;
use App\Repositories\Interfaces\CategoryRepositoryInterface;


class ProfileController extends DashboardController
{
    public function __construct(AdminRepository $adminRepository)
    {
        $this->repositoryInterface = $adminRepository;
        $this->updateRequestClass = new UpdateProfileRequest();
        $this->editView = 'profile.edit';
        $this->successMessage = 'Process success';
    }

}
