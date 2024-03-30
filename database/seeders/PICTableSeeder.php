<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\pic;

class picTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        pic::create(['pic' => 'HCGS']);
        pic::create(['pic' => 'FAT']);
        pic::create(['pic' => 'Eng, Port & Road']);
        pic::create(['pic' => 'Plant & SM']);
        pic::create(['pic' => 'SHE']);
        pic::create(['pic' => 'Project Management']);
    }
}
