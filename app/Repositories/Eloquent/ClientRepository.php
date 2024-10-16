<?php

namespace App\Repositories\Eloquent;

use App\Models\BloodType;
use App\Models\Client;
use App\Repositories\Interfaces\ClientRepositoryInterface;

class ClientRepository extends BaseRepository implements ClientRepositoryInterface
{
    public function __construct(Client $client)
    {
        parent::__construct($client);
    }

    public function filter($data)
    {
        return Client::filter($data)->paginate(10);
    }
}
