<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::get();
        return response()->json(["message"=>"success", "users"=>$users], 200);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name"=> "required|max:255",
            "email"=> "required|email|max:255|unique:users",
            "password"=> "required|min:8"
        ]);
        if ($validator->fails())
        {
            return response()->json(["message"=> "Invalid Field","errors"=>$validator->errors()], 422);
        }
        $input = $request->all();
        $user = User::create($input);
        return response()->json(["message"=>"User created successfully", "user"=>$user], 201);
    }
    public function update(User $user, Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name"=> "required|max:255",
            "email"=> "required|email|max:255|unique:users,email,".$user->id,
            "password"=> "nullable|min:8"
        ]);
        if ($validator->fails())
        {
            return response()->json(["message"=> "Invalid Field","errors"=>$validator->errors()], 422);
        }
        $input = $request->all();
        if(empty($input['password']))
        {
            unset( $input['password'] );
        }
        $user->update($input);
        return response()->json(["message"=>"User updated successfully", "user"=>$user], 200);
    }
    public function destroy (User $user, Request $request)
    {
        $user->delete();
        return response()->json(["message"=>"User deleted successfully"], 200);
    }

}
