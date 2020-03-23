<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class RegisterController
 * @package App\Http\Controllers\Api
 */
class RegisterController extends Controller
{

    /**
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request)
    {
        $response = [
            'result' => false,
            'token' => '',
            'error' => '',
        ];

        $input = $request->all();

        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $response['token'] = $user->createToken('AppName')->accessToken;
        $response['result'] = true;
        return response()->json(
            $response,
            200
        );
    }

}
