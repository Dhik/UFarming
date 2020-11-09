<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1,10) as $item){
            DB::table('article')->insert([
                'id' => $item,
                'title' => "title article $item",
                'category' => "category article $item",
                'desc' => "ini isi article lorem ipsum sir $item",
                'source' => "ini source article $item",
                'id_plant' => $item,
                'foto' => "foto $item .jpg",
            ]);
        } 
    }
}
