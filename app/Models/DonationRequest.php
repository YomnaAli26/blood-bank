<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

class DonationRequest extends Model
{

    protected $table = 'donation_requests';
    public $timestamps = true;
    protected $fillable = array('patient_name', 'patient_phone', 'patient_age', 'blood_type_id', 'bags_num', 'hospital_name', 'hospital_address', 'latitude', 'longitude', 'city_id', 'notes', 'client_id');

    public function client(): BelongsTo
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function bloodType(): BelongsTo
    {
        return $this->belongsTo(BloodType::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class);
    }

}