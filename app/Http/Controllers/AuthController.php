<?php

namespace App\Http\Controllers;

use Illuminate\Http\{
    Request, JsonResponse
};
use Illuminate\Support\Str;
use Illuminate\Support\Facades\{
    Auth, Hash
};
use App\Models\{
    User
};

class AuthController extends Controller
{
    function login(Request $request) : JsonResponse 
    {
        $data = $request->validate([
            "email" => ["required", "email"],
            "password" => ["required"]
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
           
            $token = Auth::user()->createToken("authToken")->accessToken;
            Auth::user()->forceFill([
                'api_token' => $token,
            ])->save();

            return response()->json([
                "id" => Auth::id(),
                "name" => Auth::user()->name,
                "email" => $request->email,
                "token" => $token,
            ]);
        }

        return response()->json([], 401);
    }

    function register(Request $request) : JsonResponse
    {
        $data = $request->validate([
            "name" => ["required"],
            "email" => ["required", "unique:users", "email"],
            "password" => ["required", "min:6"],
            "password_confirmation" => ["required", "same:password" ]
        ]);

        if($data){

            $new_user = new User;
            $new_user->name = $data["name"];
            $new_user->email = $data["email"];
            $new_user->password = bcrypt($data["password"]);
            $new_user->api_token = Str::random(60);
            $new_user->save();

            return response()->json([
                "data" => $new_user
            ]);
        }

        return response()->json([], 400);

    }
}
