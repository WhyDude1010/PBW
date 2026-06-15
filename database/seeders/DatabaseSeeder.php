<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Beauty',
            'email' => 'adminbeauty@gmail.com',
            'password' => 'Beauty123',
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'User Client',
            'email' => 'user@gmail.com',
            'password' => 'password123',
            'role' => 'user',
        ]);

        $mua = User::create([
            'name' => 'MUA Beauty',
            'email' => 'mua@gmail.com',
            'password' => 'password123',
            'role' => 'mua',
        ]);

        \App\Models\MuaProfile::create([
            'user_id' => $mua->id,
            'bio' => 'Professional makeup artist.',
            'location' => 'Jakarta',
            'styles' => ['Wedding', 'Party'],
            'price_min' => 500000,
            'price_max' => 2000000,
        ]);
    }
}
