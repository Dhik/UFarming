<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function list($id){
    $activity = Activity::where('id_myplant', $id)->get();

    return response()->json([
      'activity' => $activity, 
      'message' => 'SUCCESS'
    ], 200);
  }

  public function store(Request $request){
    $activity = new Activity;
    $activity->id = Str::uuid();
    $activity->title = $request->title;
    $activity->id_myplant = $request->id_myplant;
    $activity->save();

    return response()->json([
        "status" => 201,
        "data" => $activity
    ], 201);
  }

  public function delete($id) {
    $activity = Activity::find($id);
    $activity->delete();

    return response()->json([
      "status" => 200,
      "data" => $activity,
    ], 200);
  }
}
