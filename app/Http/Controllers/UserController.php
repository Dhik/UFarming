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
    return response()->json(['user' => Auth::user()], 200);
  }


  public function update(Request $request)
  {
    $file = $request->file('foto');
    $nama_foto = time()."_".
    $tujuan_upload = 'data_file';
 
      // upload file
    $file->move($tujuan_upload,$file->getClientOriginalName());

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
    $user->profile_picture = $nama_foto;
    
    if(@$request->email != $user->email) {
      $user->email = $request->email;
    }

    if ($user->save()) {
      return response()->json(['user' => $user, 'message' => 'User has been updated'], 200);
    }else{
      return response()->json(['message' => 'Failed to update'], 500);
    }
  }

}
