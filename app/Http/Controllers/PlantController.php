<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plant;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

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

    return response()->json([
      'plant' => $plant, 
      'message' => 'SUCCESS'
    ], 200);
  }
}
