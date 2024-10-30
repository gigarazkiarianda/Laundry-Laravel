<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'admin1',
                'email' => 'admin1@example.com', // Add email for admin
                'password_hash' => Hash::make('adminpassword'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'username' => 'kasir1',
                'email' => 'kasir1@example.com', // Add email for cashier
                'password_hash' => Hash::make('kasirpassword'),
                'role' => 'kasir',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
