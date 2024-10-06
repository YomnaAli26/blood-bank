<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsToMany,HasMany};

class BloodType extends Model
{

    protected $fillable = array('name');

    public function clients(): HasMany
    {
        return $this->hasMany(Client::class);
    }

    public function donationRequests(): HasMany
    {
        return $this->hasMany(DonationRequest::class);
    }

    public function sharedClients(): BelongsToMany
    {
        return $this->belongsToMany(Client::class);
    }

}
