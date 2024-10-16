<?php

namespace App\Repositories\Eloquent;

use App\Models\DonationRequest;
use App\Repositories\Interfaces\DonationRequestRepositoryInterface;

class DonationRequestRepository extends BaseRepository implements DonationRequestRepositoryInterface
{
    public function __construct(DonationRequest $donationRequest)
    {
        parent::__construct($donationRequest);
    }
}
