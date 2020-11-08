<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile(Request $request){
        $data = User::select('name','foto')
                    ->first();
        if(!empty($data)){
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