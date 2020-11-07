<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\User;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function register(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'name' => 'required|string',
            'username' => 'required|string|unique:users',
            'password' => 'required',
        ]);

        try {

            $user = new User;
            $user->id = Str::uuid();
            $user->email = $request->input('email');
            $user->name = $request->input('name');
            $user->username = $request->input('username');

            $user->location = "";
            $user->active_plant = 0;
            $user->profile_picture = "";
            $plainPassword = $request->input('password');
            $user->password = app('hash')->make($plainPassword);

            $user->save();

            //return successful response
            return response()->json(['user' => $user, 'message' => 'CREATED'], 201);

        } catch (\Exception $e) {
            //return error message
            return response()->json(['message' => 'User Registration Failed!' . $e], 409);
        }

    }


}