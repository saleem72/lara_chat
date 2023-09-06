<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserRoleEnum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\JsonResponses\V1\CustomJson;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $email = $request['email'];
        $password = $request['password'];
        $flag = Auth::attempt([
            'email' => $email,
            'password' => $password
        ]);

        if ($flag) {
            $user = Auth::user();
            if ($user instanceof \App\Models\User) {
                $roles = ['create', 'update'];
                $tokenName = 'basicToken';

                if ($user->role_id == UserRoleEnum::ADMIN) {
                    $roles = ['create', 'update', 'delete'];
                    $tokenName = 'updateToken';
                }

                $token = $user->createToken($tokenName, $roles)->plainTextToken;

                $date = new CustomJson(status: true, message: 'You have logged in successfully', data: [
                    'user' => new UserResource($user),
                    'token' => $token
                ]);

                return response()->json($date->toArray(), 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Some thing wrong happend, please try again later.',
                    'data' => NULL
                ], 500);
            }
        }
        $data = new CustomJson(status: false, message: 'Invalid Credentials.', data: Null);
        return response()->json($data->toArray(), 400);
    }
}
