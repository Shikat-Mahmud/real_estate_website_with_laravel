<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\AdminUser;

class AdminUsersTableSeeder extends Seeder
{
    public function run()
    {
        $existingUser = AdminUser::where('username', 'admin@example.com')->first();

        if ($existingUser) {
            // Update existing user instead of inserting
            $existingUser->update([
                'first_name' => 'Admin',
                'last_name' => 'User',
                'password' => Hash::make('newpassword'),
            ]);
        } else {
            // Insert a new user
            AdminUser::create([
                'first_name' => 'Admin',
                'last_name' => 'User',
                'username' => 'admin@example.com',
                'password' => Hash::make('password'),
            ]);
        }
    }
}

