<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $validateUser = Validator::make(
                $request->all(),
                [
                    'email' => 'required|email',
                    'password' => 'required',
                    'remember' => 'boolean'
                ]
            );

            if ($validateUser->fails()) {
                return $this->resFormError($validateUser->errors());
            }

            if (!Auth::attempt($request->only(['email', 'password']), $request->input('remember'))) {
                return $this->resError(trans('auth.failed'));
            }

            $user = User::where('email', $request->email)->first();

            return $this->resData([
                'user' => $user,
                'token' => $user->createToken("apiToken")->plainTextToken
            ]);
        } catch (\Throwable $th) {
            return $this->resError($th->getMessage(), 500);
        }
    }

    public function getUser(Request $request)
    {
        $user = $request->user();
        return $this->resData($user);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        auth()->user()->tokens()->delete();
        return $this->resData();
    }
}
