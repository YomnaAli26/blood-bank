<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\DashboardController;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Repositories\Interfaces\CategoryRepositoryInterface;


class CategoryController extends DashboardController
{
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->repositoryInterface = $categoryRepository;
        $this->storeRequestClass = new StoreCategoryRequest();
        $this->updateRequestClass = new UpdateCategoryRequest();
        $this->indexView = 'categories.index';
        $this->createView = 'categories.create';
        $this->showView = 'categories.show';
        $this->editView = 'categories.edit';
        $this->successMessage = 'Process success';
    }

}
