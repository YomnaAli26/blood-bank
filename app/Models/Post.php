<?php

namespace App\Models;

use App\Traits\FilterTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, BelongsToMany};
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use FilterTrait, InteractsWithMedia;

    protected $fillable = array('title', 'description', 'category_id');
    protected $with = [
        'category'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function clients(): BelongsToMany
    {
        return $this->belongsToMany(Client::class);
    }

    public function isFavourite(): Attribute
    {
        return Attribute::make(
            get: fn()=>auth()->check() && $this->clients->contains(auth()->id())
        );
    }

}
