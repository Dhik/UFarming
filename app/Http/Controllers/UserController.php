<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function profile()
  {
    $user = Auth::user();
    $user->profile_picture = url('data_file')."/".$user->profile_picture;
    return response()->json(['user' => $user], 200);
  }


  public function update(Request $request)
  {
    $this->validate($request, [
      'email' => 'required|email',
      'name' => 'required|string',
      'username' => 'required|string',
      'password' => 'required|confirmed',
    ]);

    $user = User::where('id', Auth::user()->id)->first();
    $user->email = $request->email;
    $user->name = $request->name;
    $user->username = $request->username;
    $user->password = $request->password;
    
    if(@$request->email != $user->email) {
      $user->email = $request->email;
    }

    if ($user->save()) {
      return response()->json(['user' => $user, 'message' => 'User has been updated'], 200);
    }else{
      return response()->json(['message' => 'Failed to update'], 500);
    }
  }
  public function update_picture(Request $request) {
    $file = $request->file('foto');
    $nama_foto = time().'.'.$file->getClientOriginalExtension();
    $tujuan_upload = 'data_file';
 
    // upload file
    $file->move($tujuan_upload,$nama_foto);

    $user = User::where('id', Auth::user()->id)->first();
    $user->profile_picture = $nama_foto;

    if ($user->save()) {
      $user->profile_picture = url('data_file')."/".$nama_foto;
      return response()->json(['user' => $user, 'message' => 'User has been updated'], 200);
    }else{
      return response()->json(['message' => 'Failed to update'], 500);
    }
  }
}
