<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function __construct(){
    	$this->middleware('auth:api',['except'=>['unauthorized', 'login']]);
    	$this->guard = "api";
    }

    public function unauthorized(){
    	return response()->json(Response::HTTP_ANAUTHORIZED);
    }

    public function login(){

    	$credentials = request(['email', 'password']);


    	if(! $token = auth($this->guard)->attempt($credentials)) {
    		return response()->json(['error' => 'Unauthorized'], 200);
    	}
    	$token = $this->respondWithToken($token);
    	$user = response()->json(auth($this->guard)->user());
    	return response()->json(['token' => $token, 'user' => $user],200);
    }

    public function me(){
    	return response()->json(auth($this->guard)->user());
    }

    public function logout(){
    	auth($this->guard)->logout();
    	return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh(){
    	return $this->respondWithToken(auth($this->guard)->refresh());
    }

    protected function respondWithToken($token){
    	return response()->json([
			'access_token' => $token,
			'token_type' => 'bearer',
			'expires_in' => auth($this->guard)->factory()->getTTL() * 10080
    	]);
    }
}
