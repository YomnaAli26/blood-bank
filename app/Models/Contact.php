<?php

namespace App\Models;

use App\Traits\FilterTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
    use FilterTrait;

    protected $table = 'contacts';
    public $timestamps = true;
    protected $fillable = array('message_title', 'message_content', 'client_id');
    protected $with = ['client','notification'];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function notification(): BelongsTo
    {
        return $this->belongsTo(Notification::class);
    }

}
