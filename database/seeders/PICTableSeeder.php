<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PIC;

class PICTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PIC::create(['PIC' => 'PLANT']);
        PIC::create(['PIC' => 'SM']);
        PIC::create(['PIC' => 'OPRENG']);
        PIC::create(['PIC' => 'SHE']);
        PIC::create(['PIC' => 'HCGS']);
    }
}
