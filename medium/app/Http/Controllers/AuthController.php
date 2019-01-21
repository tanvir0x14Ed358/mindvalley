<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        if(!isset($credentials['email']) || !isset($credentials['password'])){
            return response()->json(['email' => 'The email field is required.',
                'password' => 'The password field is required.'], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $token = auth('api')->login($user);

        return $this->respondWithToken($token);
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        if(!isset($credentials['email']) || !isset($credentials['password'])){
            return response()->json(['email' => 'The email field is required.',
                'password' => 'The password field is required.'], 422);
        }

        if (!$token = auth('api')->attempt($credentials)) {

            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
}
