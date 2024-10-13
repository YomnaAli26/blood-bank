<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FcmToken extends Model
{
    use HasFactory;

    protected $fillable = [
        'token',
        'client_id',
        'platform',
    ];
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
