<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checklist;
use App\Models\MyPlant;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ChecklistController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function list(){
    $article = Article::all();
    foreach ($article as $item) {
      $item->picture = url('article')."/".$item->picture;
    }
    
    return response()->json([
      'articles' => $article, 
      'message' => 'SUCCESS'
    ], 200);
  }

  public function store(Request $request){
    $checklist = new Checklist;
    $checklist->id = Str::uuid();
    $checklist->title = $request->title;
    $checklist->is_checked = false;
    $checklist->desc = $request->desc;
    $checklist->id_myplant = $request->id_myplant;
    $checklist->save();

    return response()->json([
        "status" => 201,
        "data" => $checklist
    ], 201);
  }

  public function storeDefault(Request $request){
    // TO DO dynamically
    $title = [
      "Nutrition", 
      "Check Water Level"
    ];
    $desc = [
      "Add 20gr nutrition to the water to make the plant grow faster.",
      "Check the water level, and add additional water to compensate for evaporation, as necessary."
    ];

    foreach(range(0, count($title)-1) as $item) {
      $idMyplant = $request->id_myplant;

      $checklist = new Checklist;
      $checklist->id = Str::uuid();
      $checklist->title = $title[$item];
      $checklist->is_checked = false;
      $checklist->desc = $desc[$item];
      $checklist->id_myplant = $idMyplant;
      $checklist->save();
    }

    $data = Checklist::where('id_myplant', $idMyplant)->get();

    return response()->json([
      "status" => 201,
      "data" => $data
    ], 201);
  }

  public function doCheck(Request $request){
    $checklist = Checklist::where('id', $request->id)->first();

    if ($checklist) {
      if ($checklist->is_checked == true) {
        $checklist->is_checked = false;
      } else {
        $checklist->is_checked = true;
      }
      
      $checklist->save();
  
      return response()->json([
          "status" => 201,
          "data" => $checklist
      ], 201);
    }

    return response()->json([
        "status" => 400,
        "messages" => "checklist not found"
    ], 400);
  }
  public function my_plant(Request $request) {
    $checklist = Checklist::where('id_myplant', $request->id)->get();

    if ($checklist) {
      return response()->json([
          "status" => 201,
          "data" => $checklist
      ], 201);
    }

    return response()->json([
        "status" => 400,
        "messages" => "checklist not found"
    ], 400);
  }
}
