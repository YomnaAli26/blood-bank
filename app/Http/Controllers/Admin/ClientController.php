<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\DashboardController;
use App\Repositories\Interfaces\ClientRepositoryInterface;


class ClientController extends DashboardController
{
    public function __construct(ClientRepositoryInterface $clientRepository)
    {
        $this->repositoryInterface = $clientRepository;
        $this->indexView = 'clients.index';
        $this->successMessage = 'Process success';
    }

}
