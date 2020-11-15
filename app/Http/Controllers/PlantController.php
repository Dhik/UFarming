<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plant;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PlantController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function list(){
    $plants = Plant::select(
      'plant.id', 'plant_name', 'category_name', 'difficulty', 'picture'
    )
    ->join('category', 'category_id', '=', 'category.id')
    ->get();
    
    foreach ($plants as $item) {
      $item->picture = url('plant')."/".$item->picture;
    }

    return response()->json([
      'plants' => $plants, 
      'message' => 'SUCCESS'
    ], 200);
  }

  public function detail($id) {
    $plant = Plant::select(
      'plant.*', 'category_name', 'type_name'
    )
    ->where('plant.id', $id)
    ->join('category', 'category_id', '=', 'category.id')
    ->join('type', 'type_id', '=', 'type.id')
    ->first();
    
    $plant->picture = url('plant')."/".$plant->picture;
    
    $article = array(
      'title' => 'What is Urban farming',
      'picture' => url('article')."/"."urban-farming.jpg",
      'category' => 'General',
      'author'  => 'beautifulhomes',
      'timestamp' => Carbon::now()->format('Y-m-d H:i:s'),
      'description' => '
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
      '
    );

    $statistic = array(
      'germ_days_low' => 6,
      'germ_days_up' =>  7, 
      'germ_temperature_low'  => 20,
      'germ_temperature_up'  => 25,
      'growth_days_low' => 6,
      'growth_days_up' => 7,
      'height_low'  => 30,
      'height_up'  => 70,
      'ph_low'  => 6,
      'ph_up'  => 7,
      'spacing_low' => 15,
      'spacing_up' => 25,
      'temperature_low' => 18,
      'temperature_up' => 25,
      'width_low' => 30,
      'width_up' => 40
    );

    return response()->json([
      'plant' => $plant, 
      'article' => $article,
      'statistic' => $statistic,
      'message' => 'SUCCESS'
    ], 200);
  }
}
