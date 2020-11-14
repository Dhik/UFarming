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
    $plants = Plant::all();
    return response()->json($plants, 200);
  }

  public function detail($id) {
    $plant = Plant::where('id', $id)->first();
    $response = array(
      'name'        => $plant->nama_tanaman,
      'picture'     => $plant->foto,
      'difficulty'  => 'Easy',
      'category'    => 'Hydroponic',
      'type'        => 'Vegetable',
      'stages'      => 5,
      'total_days'  => 34,
      'success_rate'=> 0.87,
      'summary'     => $plant->summary
    );
    return response()->json([
      'plant' => $response, 
      'message' => 'SUCCESS'
    ], 200);
  }
}
