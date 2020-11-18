<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plant;
use App\Models\CropStatistic;
use App\Models\Category;
use App\Models\Article;
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
    
    $statistic = CropStatistic::where('id_plant', $id)->first();
    
    $category = Category::where('id', $plant->category_id)->first();
    $article = Article::where('id', $category->article_id)->first();
    $article->picture = url('article')."/".$article->picture;

    return response()->json([
      'plant' => $plant, 
      'article' => $article,
      'statistic' => $statistic,
      'message' => 'SUCCESS'
    ], 200);
  }
}
