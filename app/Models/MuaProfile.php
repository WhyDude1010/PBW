<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MuaProfile extends Model
{
    protected $fillable = ['user_id', 'bio', 'location', 'styles', 'price_min', 'price_max', 'is_available', 'packages', 'add_ons', 'available_hours'];

    protected function casts(): array
    {
        return [
            'styles' => 'array',
            'is_available' => 'boolean',
            'packages' => 'array',
            'add_ons' => 'array',
            'available_hours' => 'array',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
