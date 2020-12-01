<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plant;
use App\Models\CropStatistic;
use App\Models\Category;
use App\Models\Article;
use App\Models\MyPlant;
use App\Models\Checklist;
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
    $result->is_done = 0;
    $result->save();
    return response()->json([
        "status" => 201,
        "data" => $result
    ], 201);
  }

  public function list() {
      $user = Auth::user();
      $data = MyPlant::select('my_plant.id', 'plant.id AS id_plant', 'name', 'plant_name', 'progress', 'picture')
      ->where('id_user',$user->id)
      ->join('plant', 'plant.id', '=', 'my_plant.id_plant')
      ->get();

      // $tasks = [
      //   array(
      //     'file' => "Nutrition",
      //     'is_checked' => true,
      //   ),
      //   array(
      //     'file' => "Check Water Level",
      //     'is_checked' => false,
      //   ),
      // ];

      foreach ($data as $item) {
        $item->picture = url('plant')."/".$item->picture;

        $checklist = Checklist::where('id_myplant', $item->id);
        $item->total_task = $checklist->count();
        $item->finish_task = $checklist->where('is_checked', true)->count();
        // $item->list_task = $tasks;
      }

      return response()->json([
        "status" => 200,
        "data" => $data
      ], 200);

  }
  public function delete($id) {
      $my_plant = MyPlant::find($id);
    	$my_plant->delete();
 
    	return response()->json([
        "status" => 200,
        "data" => $my_plant,
      ], 200);
  }
  public function is_done($id) {
    $status = MyPlant::where('id',$id)->first();

    if ($status) {
      if ($status->is_done == true) {
        $status->is_done = false;
      } else {
        $status->is_done = true;
      }
      
      $status->save();
  
      return response()->json([
          "status" => 201,
          "data" => $status
      ], 201);
    }

    return response()->json([
        "status" => 400,
        "messages" => "checklist not found"
    ], 400);
  }
}
