<?php

namespace App\Repositories\Eloquent;


use App\Models\Contact;
use App\Repositories\Interfaces\ContactRepositoryInterface;

class ContactRepository extends BaseRepository implements ContactRepositoryInterface
{
    public function __construct(Contact $contact)
    {
        parent::__construct($contact);
    }

    public function filter($data)
    {
        return Contact::filter($data)->paginate(10);

    }
}
