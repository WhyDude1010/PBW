<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['booking_id', 'user_id', 'mua_profile_id', 'rating', 'comment'];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function muaProfile()
    {
        return $this->belongsTo(MuaProfile::class);
    }
}
