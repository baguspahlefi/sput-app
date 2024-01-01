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
            'name' => 'Jordan AlMurtadlo',
            'email' => 'jordan.murtadlo@kppmining.com',
            'nrp' => 'KB1234',
            'pic' => 'MD',
            'akses' => 'ADMIN',
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole('ADMIN');

        // $user = User::create([
        //     'name' => 'User',
        //     'email' => 'user@gmail.com',
        //     'nrp' => '123',
        //     'password' => bcrypt('password'),
        // ]);
        // $user->assignRole('PLANT');

        // $user2 = User::create([
        //     'name' => 'User2',
        //     'email' => 'user2@gmail.com',
        //     'nrp' => '456',
        //     'password' => bcrypt('password'),
        // ]);
        // $user2->assignRole('PLANT');

        // $user3 = User::create([
        //     'name' => 'User3',
        //     'email' => 'user3@gmail.com',
        //     'nrp' => '789',
        //     'password' => bcrypt('password'),
        // ]);
        // $user3->assignRole('PLANT');
    }
}
