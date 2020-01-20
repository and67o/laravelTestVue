<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public $successStatus = 200;

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function register(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'password' => 'required',
                'c_password' => 'required|same:password',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('AppName')->accessToken;
        return response()->json(['success' => $success], $this->successStatus);
    }

    /**
     * @return JsonResponse
     */
    public function login()
    {
        if (!Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            return response()->json(
                ['error' => 'Unauthorised'],
                401
            );
        }
        $user = Auth::user();
        $success['token'] = $user->createToken('AppName')->accessToken;
        return response()->json(
            ['success' => $success],
            $this->successStatus
        );

    }

    /**
     * @return JsonResponse
     */
    public function getUser()
    {
        $user = Auth::user();
        return response()->json(
            ['success' => $user],
            $this->successStatus
        );
    }
}
