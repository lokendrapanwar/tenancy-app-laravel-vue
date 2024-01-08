<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;


class UserController extends Controller
{

    // User Login API Function
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $userData = User::where('email', $request->input('email'))->first();
        if ($userData) {
            if (Hash::check($request->password, $userData->password)) {
                $success['token'] = $userData->createToken('authToken')->accessToken;
                $success['name'] = $userData->name;
                $userData->role = $userData->getRoleNames()->first();
                $success['user'] = $userData;
                $success['permissions'] = $userData->permissions;

                $response = [
                    'success' => true,
                    'data' => $success,
                    'message' => "Login Successfully!",
                ];
                return response()->json($response, 200);

            } else {
                return response()->json(['message' => 'email or password incorrect!'], 403);
            }
        } else {
            return response()->json(['message' => 'User does not exist, please register'], 404);
        }
    }

    // Passport Logout API
    public function logout(Request $request)
    {
        try {
            if ($request->user()) {
                $request->user()->token()->revoke();
            } 
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json(['error' => 'Unable to log out'], 500);
        }
        return response()->json(['message' => 'You have been successfully logged out!'], 200);
    }
    
    // User Data
    public function userData(Request $request)
    {
        $userData = $request->user();
        $userData->role = $userData->getRoleNames()->first();
        return response()->json($userData, 200);
    }

}