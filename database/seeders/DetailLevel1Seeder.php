<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DetailLevel1;

class DetailLevel1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = DetailLevel1::create([
            'id_meeting_level_1' => '1',
            'point_of_meeting' => 'Test Point Of Meeting 1',
            'pic' => 'PLANT',
            'due' => '2023-10-10',
            'status' => 'CLOSE',
        ]);

        $data = DetailLevel1::create([
            'id_meeting_level_1' => '1',
            'point_of_meeting' => 'Test Point Of Meeting 2',
            'pic' => 'FAT',
            'due' => '2023-10-10',
            'status' => 'OPEN',
        ]);
    }
}
