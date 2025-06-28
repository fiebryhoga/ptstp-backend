<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Jalankan seeder.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@siwalantehnik.com'],
            [
                'name' => 'Admin Siwalan',
                'password' => Hash::make('password123'),
            ]
        );
    }
}
