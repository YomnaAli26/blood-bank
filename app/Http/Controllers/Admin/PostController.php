<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\DashboardController;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\StorePostRequest;
use App\Repositories\Interfaces\CategoryRepositoryInterface;


class PostController extends DashboardController
{
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->repositoryInterface = $categoryRepository;
        $this->storeRequestClass = new StorePostRequest();
        $this->indexView = 'posts.index';
        $this->createView = 'posts.create';
        $this->editView = 'posts.edit';
        $this->successMessage = 'Process success';
    }

}
