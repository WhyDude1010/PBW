<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Musevia',
            'email' => 'adminmusevia@gmail.com',
            'password' => 'Musevia123',
            'role' => 'admin',
        ]);
    }
}
