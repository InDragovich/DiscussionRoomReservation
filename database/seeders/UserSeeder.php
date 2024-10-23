<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('#admin1234'),
            'role' => UserRole::Admin,
            'created_at' => now()
        ]);

        User::create([
            'name' => 'Agus Indra',
            'email' => 'agusindra@gmail.com',
            'password' => Hash::make('#user1234'),
            'role' => UserRole::User,
            'created_at' => now()
        ]);
    }
}