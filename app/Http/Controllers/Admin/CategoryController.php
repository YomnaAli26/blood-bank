<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\DashboardController;
use App\Http\Requests\StoreCategoryRequest;
use App\Repositories\Interfaces\CategoryRepositoryInterface;


class CategoryController extends DashboardController
{
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->repositoryInterface = $categoryRepository;
        $this->storeRequestClass = new StoreCategoryRequest();
        $this->indexView = 'categories.index';
        $this->createView = 'categories.create';
        $this->editView = 'categories.edit';
        $this->successMessage = 'Process success';
    }

}
