<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;

class CropStatisticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plants = DB::table('plant')->get();

        foreach(range(0,2) as $i){
            DB::table('crop_statistic')->insert([
                'id' => Str::uuid(),
                'id_plant' => $plants[$i]->id,
                'germ_days_low' => 6+($i*$i),
                'germ_days_up' =>  7+($i*$i), 
                'germ_temperature_low'  => 20+($i*$i),
                'germ_temperature_up'  => 25+($i*$i),
                'growth_days_low' => 6+($i*$i),
                'growth_days_up' => 7+($i*$i),
                'height_low'  => 30+($i*$i),
                'height_up'  => 70+($i*$i),
                'ph_low'  => 6+($i*$i),
                'ph_up'  => 7+($i*$i),
                'spacing_low' => 15,
                'spacing_up' => 25,
                'temperature_low' => 18,
                'temperature_up' => 25,
                'width_low' => 30,
                'width_up' => 40,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        } 
    }
}
