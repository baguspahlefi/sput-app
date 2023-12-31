<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DetailLevel1;
use App\Models\DetailLevel2;
use Faker\Factory as Faker;
use DB;

class DetailLevel1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id');
		$picList = ['FAT', 'Engineering Road', 'Port Operation', 'SM', 'PLANT', 'SHE', 'Project Management'];
		$statusList = ['OPEN','PROGRESS','CLOSE'];
 
    	for($i = 1; $i <= 40; $i++){
 
    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('detail_level1')->insert([
    			'id_meeting' => $faker->numberBetween(1, 2),
    			'point_of_meeting' => $faker->text(50),
    			'pic' => $faker->randomElement($picList),
    			'due' => $faker->dateTimeThisCentury->format('Y-m-d'),
    			'status' => $faker->randomElement($statusList),
    		]);
 
    	}
    }
}
