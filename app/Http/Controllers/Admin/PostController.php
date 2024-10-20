<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\DashboardController;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Repositories\Interfaces\PostRepositoryInterface;


class PostController extends DashboardController
{
    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->repositoryInterface = $postRepository;
        $this->storeRequestClass = new StorePostRequest();
        $this->updateRequestClass = new UpdatePostRequest();
        $this->exculdeFile = 'image';
        $this->indexView = 'posts.index';
        $this->showView = 'posts.show';
        $this->createView = 'posts.create';
        $this->editView = 'posts.edit';
        $this->successMessage = 'Process success';
    }

}
