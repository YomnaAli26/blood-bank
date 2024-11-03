<?php

namespace App\Services;

use App\Repositories\Interfaces\BloodTypeRepositoryInterface;
use Illuminate\Http\Request;

class BloodTypeService
{
    public function __construct(public BloodTypeRepositoryInterface $bloodTypeRepository)
    {
    }

    public function getBloodTypes()
    {

        return $this->bloodTypeRepository->all();
    }

    public function showBloodType($id)
    {
        return $this->bloodTypeRepository->find($id);

    }


}
