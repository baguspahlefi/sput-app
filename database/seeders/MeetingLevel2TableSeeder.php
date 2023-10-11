<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MeetingLevel2;

class MeetingLevel2TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $level2 = MeetingLevel2::create([
            'judul' => 'Meeting level 2',
            'tanggal' => '2023-10-06'
        ]);
    }
}
