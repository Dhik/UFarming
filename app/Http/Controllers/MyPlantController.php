<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plant;
use App\Models\CropStatistic;
use App\Models\Category;
use App\Models\Article;
use App\Models\MyPlant;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MyPlantController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function store(Request $request){
    $user = Auth::user();

    $result = new MyPlant;
    $result->id = Str::uuid();
    $result->id_user = $user->id;
    $result->id_plant = $request->id_plant;
    $result->name = $request->name;
    $result->progress = 0;
    $result->save();
    return response()->json([
        "status" => 201,
        "data" => $result
    ], 201);
  }

  public function list() {
      $user = Auth::user();
      $data = MyPlant::select('my_plant.id', 'name', 'plant_name', 'progress', 'picture')
      ->where('id_user',$user->id)
      ->join('plant', 'plant.id', '=', 'my_plant.id_plant')
      ->get();

      $tasks = [
        array(
          'task' => "Nutrition",
          'ischeck' => true,
        ),
        array(
          'task' => "Check Water Level",
          'ischeck' => false,
        ),
      ];

      foreach ($data as $item) {
        $item->picture = url('plant')."/".$item->picture;
        $item->finish_task = 1;
        $item->total_task = 12;
        $item->list_task = $tasks;
      }

      return response()->json([
        "status" => 200,
        "data" => $data
      ], 200);

  }
}
