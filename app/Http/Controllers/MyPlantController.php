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
    $result->progress = $request->progress;
    $result->save();
    return response()->json([
        "status" => 201,
        "data" => $result
    ], 201);
  }
  public function list() {
      $user = Auth::user();
      $data = MyPlant::where('id_user',$user->id)->get();

      if(!$data->isEmpty()){
        return response()->json([
          "status" => 200,
          "data" => $data
      ], 200);
      }
      else{
        return response()->json([
          "status" => 401,
          'message'=>'Unauthorized'
      ], 401); 
      }
  }
}
