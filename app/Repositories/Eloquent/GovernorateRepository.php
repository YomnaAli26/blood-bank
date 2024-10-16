<?php

namespace App\Repositories\Eloquent;


use App\Models\Governorate;
use App\Repositories\Interfaces\GovernorateRepositoryInterface;

class GovernorateRepository extends BaseRepository implements GovernorateRepositoryInterface
{
    public function __construct(Governorate $governorate)
    {
        parent::__construct($governorate);
    }
}
