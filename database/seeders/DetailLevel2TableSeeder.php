<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DetailLevel2;

class DetailLevel2TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = DetailLevel2::create([
            'id_meeting_level_2' => '1',
            'point_of_meeting' => 'Test Point Of Meeting level 2-1',
            'pic' => 'PLANT',
            'due' => '2023-10-10',
            'status' => 'CLOSE',
        ]);

    }
}
