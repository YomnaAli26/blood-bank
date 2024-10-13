<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany, BelongsToMany};
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class Client extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = array(
        'name', 'email', 'phone', 'password',
        'code', 'b_o_d', 'last_donation_date',
        'city_id', 'blood_type_id'
    );
    protected $hidden = [
        'remember_token',
        'password',
    ];
    protected $with = [
        'governorates',
        'bloodTypes',
        'notifications',
        'posts',
        'donationRequests',
        'city',
        'bloodType',
    ];
    protected $casts = [
        'password' => 'hashed',
    ];

    public function bloodType(): BelongsTo
    {
        return $this->belongsTo(BloodType::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function donationRequests(): HasMany
    {
        return $this->hasMany(DonationRequest::class);
    }

    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class);
    }

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }

    public function notifications(): BelongsToMany
    {
        return $this->belongsToMany(Notification::class);
    }

    public function bloodTypes(): BelongsToMany
    {
        return $this->belongsToMany(BloodType::class);
    }

    public function governorates(): BelongsToMany
    {
        return $this->belongsToMany(Governorate::class);
    }

    public function fcmTokens(): HasMany
    {
        return $this->hasMany(FcmToken::class);
    }

    public function generateCode(): void
    {
        $this->code = rand(0000, 9999);
        $this->save();
    }

    public function resetCode()
    {
        $this->code = null;
        $this->save();
    }


}
