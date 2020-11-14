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
}
