<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PlantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(2,7) as $item){
            DB::table('plant')->insert([
                'id' => $item,
                'plant_name' => "name $item",
                'summary' => "ini text summary lorem ipsum sir $item",
                'growing' => "ini text growing lorem ipsum sir $item",
                'harvesting' => "ini text harvesting lorem ipsum sir $item",
                'picture' => "tomato.png",
                'category_id' => $item,
                'type_id' => 1,
                'stages' => $item,
                'total_days' => $item + 15,
                'success_rate' => $item / 10.0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        } 
    }
}
