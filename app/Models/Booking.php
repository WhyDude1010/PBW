<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['user_id', 'mua_profile_id', 'booking_date', 'booking_time', 'package', 'amount', 'status', 'notes'];

    protected function casts(): array
    {
        return [
            'booking_date' => 'date',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function muaProfile()
    {
        return $this->belongsTo(MuaProfile::class);
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }
}
