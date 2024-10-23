<?php

namespace App\Models;

use App\Traits\FilterTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

class City extends Model
{
    use FilterTrait;

    protected $fillable = array('name', 'governorate_id');


    public function governorate(): BelongsTo
    {
        return $this->belongsTo(Governorate::class);
    }

    public function clients(): HasMany
    {
        return $this->hasMany(Client::class);
    }

    public function donationRequests(): HasMany
    {
        return $this->hasMany(DonationRequest::class);
    }

}
