<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $desc = '
        Urban agriculture is often confused with community gardening, 
        homesteading or subsistence farming. We’re happy to be thought 
        of in such fine company but the fact is that they are very 
        different animals. What distinguishes us is that urban agriculture 
        assumes a level of commerce, the growing of product to be sold as 
        opposed to being grown for personal consumption or sharing. 
        In community gardening, there is no such commercial activity. 
        You don’t have to be a corporation to be an urban farm or 
        have a large tract of land. An individual, a couple of friends, 
        a nonprofit entity, or neighborhood group can start and run an 
        urban farm. There is no one correct sales outlet for an urban farm. 
        Food can be the sold to restaurants or at a farmers market, 
        given to a local soup kitchen or church, but the food is raised primarily 
        to be moved (through some form of commerce) from the grower to the user. 
        As more of us begin to understand our food system, more of us seek to 
        have more input into how food is grown, how it is treated after being 
        harvested and how it moves from one place along the food route to another. 
        People have begun to understand how far food travels, and that they, 
        as the consumer, have had no say in what is grown or how it is grown. 
        Urban agriculture can change that and in doing so it can take a rightful 
        place is the larger food system.
      ';

        DB::table('article')->insert([
            'id' => "1",
            'title' => "How to Set Up Hydroponic",
            'description' => $desc,
            'picture' => "how-to-set-up-hydroponic.jpg",
            'source' => "https://www.urbanorganicyield.com/hydroponic-gardening/",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('article')->insert([
            'id' => "2",
            'title' => "How to Set Up Aeorponic",
            'description' => $desc,
            'picture' => "how-to-set-up-aeroponic.jpg",
            'source' => "https://modernfarmer.com/2018/07/how-does-aeroponics-work/",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('article')->insert([
            'id' => "3",
            'title' => "How to Set Up Aquaponic",
            'description' => $desc,
            'picture' => "how-to-set-up-aquaponic.jpg",
            'source' => "https://www.urbanorganicyield.com/build-simple-aquaponics-system/",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
