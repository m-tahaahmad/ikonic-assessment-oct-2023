<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            'type' => 'admin',
            'name' => 'Admin',
            'email' => 'super@admin.com',
            'password' => Hash::make('123'),
            'permissions' => '[]'
        ];

        User::create($user);
    }
}
