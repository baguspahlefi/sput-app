<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'ADMIN']);
        Role::create(['name' => 'HCGS']);
        Role::create(['name' => 'FAT']);
        Role::create(['name' => 'Engineering Road']);
        Role::create(['name' => 'Port Operation']);
        Role::create(['name' => 'SM']);
        Role::create(['name' => 'PLANT']);
        Role::create(['name' => 'SHE']);
        Role::create(['name' => 'Project Management']);
    }
}
