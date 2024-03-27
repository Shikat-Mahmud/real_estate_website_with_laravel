<?php

namespace App\Models;

use App\Models\Conversation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookProperty extends Model
{
    use HasFactory;
    protected $fillable = ['property_id', 'book_status', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
    public function conversations()
    {
        return $this->hasMany(Conversation::class);
    }
   
}