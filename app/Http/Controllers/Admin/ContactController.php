<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\DashboardController;
use App\Repositories\Interfaces\ContactRepositoryInterface;


class ContactController extends DashboardController
{
    public function __construct(ContactRepositoryInterface $contactRepository)
    {
        $this->repository = $contactRepository;
        $this->indexView = 'contact-us.index';
        $this->successMessage = 'Process success';
    }

}
