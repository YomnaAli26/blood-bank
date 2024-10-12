<?php

namespace App\Models;

use App\Traits\FilterTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo,BelongsToMany};

class Post extends Model
{
    use FilterTrait;

    protected $fillable = array('title', 'description', 'image', 'category_id');

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function clients(): BelongsToMany
    {
        return $this->belongsToMany(Client::class);
    }

}
