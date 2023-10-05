<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'NIP' => '12345678901',
            'password' => bcrypt('qwerty123'),
        ]);
        $admin->assignRole('ADMIN');

        $user = User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'NIP' => '12345678910',
            'password' => bcrypt('qwerty123'),
        ]);
        $user->assignRole('USER');
    }
}
