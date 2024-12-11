<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\{Validator, Auth};

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'=> 'required|email',
            'password'=> 'required|min:5'
        ]);
        if ($validator->fails())
        {
            return response()->json(["message"=> "Invalid Field","errors"=>$validator->errors()], 422);
        }
        if (Auth::attempt(["email"=> $request->email,"password"=> $request->password]))
        {
            $user = Auth::user();
            $token = $user->tokens()->first();
            if (!$token)
            {
                $token = $user->createToken("accessToken")->plainTextToken;
            }
            return response()->json(["message"=> "Login success", "user"=>[
                "name"=>$user->name,
                "email"=>$user->email,
                "accessToken"=>$token
            ]], 200);
        }
        else
        {
            return response()->json(["message"=>"Email or password incorrect"], 401);
        }
        return response()->json(['message'=>'succes']);
    }

    public function logout(Request $request)
    {
        //  who the user
        $user = $request->user();

        $user->tokens()->delete();
        return response()->json(["message"=>"Logout success"], 200);

    }
}
