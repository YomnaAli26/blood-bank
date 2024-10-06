<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo,BelongsToMany};

class Notification extends Model
{
    protected $fillable = array('title', 'content', 'donation_request_id');

    public function donationRequest(): BelongsTo
    {
        return $this->belongsTo(DonationRequest::class);
    }

    public function clients(): BelongsToMany
    {
        return $this->belongsToMany(Client::class);
    }

}
