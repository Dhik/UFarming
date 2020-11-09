<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  public function profile(Request $request){
    $token = $request->bearerToken();
    $data = User::select('name','foto')
                ->where('remember_token', $token)
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
  public function update(Request $request, $id)
    {
      $user = User::where('id',$id)->first();
      $user->username = $request->username;
      $user->name = $request->name;
      $user->active_plant = $request->active_plant;
      $user->password = $request->password;
      
      if(@$request->email != $user->email) {
          $user->email = $request->email;
      }
      if ($user->save()) {
        return Response::json('User has been updated.',200);
      }else{
        return Response::json('Failed to update.',500);
      }
    }
}