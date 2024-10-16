<?php

namespace App\Repositories\Eloquent;

use App\Models\BloodType;
use App\Repositories\Interfaces\BloodTypeRepositoryInterface;

class BloodTypeRepository extends BaseRepository implements BloodTypeRepositoryInterface
{
    public function __construct(BloodType $bloodType)
    {
        parent::__construct($bloodType);
    }
}
