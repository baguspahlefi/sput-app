<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MeetingLevel1;
use App\Models\MeetingLevel2;

class MeetingLevel1TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $level1 = MeetingLevel1::create([
            'judul' => 'Meeting level 1',
            'tanggal' => '2023-10-06'
        ]);

        $level2 = MeetingLevel1::create([
            'judul' => 'Meeting level 2',
            'tanggal' => '2023-10-06'
        ]);
    }
}
