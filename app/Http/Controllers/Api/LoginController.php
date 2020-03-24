<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

/**
 * Class LoginController
 * @package App\Http\Controllers\Api
 */
class LoginController extends Controller
{
    /**
     * LoginController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $response = [
            'result' => false,
            'token' => '',
            'errors' => '',
        ];
        $input = $request->all();

        if (!Auth::attempt([
            'email' => $input['email'],
            'password' => $input['password']
        ])) {
            $response['errors'] = 'Unauthorised';
            return response()->json(
                $response,
                JsonResponse::HTTP_UNAUTHORIZED
            );
        }

        $user = Auth::user();
        $response['token'] = $user->createToken('AppName')->accessToken;
        $response['result'] = $user->id;
        return response()->json(
            $response,
            JsonResponse::HTTP_OK
        );
    }

    /**
     * @return void
     */
    public function logout()
    {
        Auth::logout();
    }

}
