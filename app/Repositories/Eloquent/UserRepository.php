<?php

namespace App\Repositories\Eloquent;

use App\Models\Admin;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(Admin $user)
    {
        parent::__construct($user);
    }
}
