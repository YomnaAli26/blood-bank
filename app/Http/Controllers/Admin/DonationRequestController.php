<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Base\DashboardController;
use App\Http\Requests\StoreDonationRequest;
use App\Http\Requests\UpdateDonationRequest;
use App\Repositories\Interfaces\DonationRequestRepositoryInterface;


class DonationRequestController extends DashboardController
{
    public function __construct(DonationRequestRepositoryInterface $donationRequestRepository)
    {
        $this->repositoryInterface = $donationRequestRepository;
        $this->storeRequestClass = new StoreDonationRequest();
        $this->updateRequestClass = new UpdateDonationRequest();
        $this->indexView = 'donation-requests.index';
        $this->createView = 'donation-requests.create';
        $this->showView = 'donation-requests.show';
        $this->editView = 'donation-requests.edit';
        $this->successMessage = 'Process success';
    }

}
