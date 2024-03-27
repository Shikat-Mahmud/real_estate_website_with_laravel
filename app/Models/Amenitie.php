<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenitie extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'status'];
    public function properties()
    {
        return $this->belongsToMany(Property::class, 'property_amenities', 'amenitie_id', 'property_id');
    }
}
