<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{HasMany, BelongsToMany};

class Governorate extends Model
{
    use HasFactory;

    protected $fillable = array('name');

    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }

    public function clients(): BelongsToMany
    {
        return $this->belongsToMany(Client::class);
    }

}
