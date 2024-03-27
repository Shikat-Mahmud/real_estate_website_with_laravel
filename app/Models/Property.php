<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function property_type()
    {
        return $this->belongsTo(PropertyType::class);
    }

    public function property_status()
    {
        return $this->belongsTo(PropertyStatus::class);
    }
    public function bookProperties()
    {
        return $this->hasMany(BookProperty::class);
    }

    public function conversations()
    {
        return $this->hasMany(Conversation::class);
    }
    public function nearestPlaces()
    {
        return $this->hasMany(NearestPlace::class);
    }
    public function amenities()
    {
        return $this->belongsToMany(Amenitie::class, 'property_amenities', 'property_id', 'amenitie_id');
    }
 
}
