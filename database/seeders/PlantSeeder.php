<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;

class PlantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1,10) as $item){
            DB::table('plant')->insert([
                'id' => $item,
                'nama_tanaman' => "name $item",
                'jenis' => "jenis $item",
                'summary' => "ini text summary lorem ipsum sir $item",
                'growing' => "ini text growing lorem ipsum sir $item",
                'harvesting' => "ini text harvesting lorem ipsum sir $item",
                'foto' => "foto $item .jpg",
            ]);
        } 
    }
}
