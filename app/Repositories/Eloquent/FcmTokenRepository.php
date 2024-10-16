<?php

namespace App\Repositories\Eloquent;


use App\Models\FcmToken;
use App\Repositories\Interfaces\FcmTokenRepositoryInterface;

class FcmTokenRepository extends BaseRepository implements FcmTokenRepositoryInterface
{
    public function __construct(FcmToken $fcm)
    {
        parent::__construct($fcm);
    }
}
