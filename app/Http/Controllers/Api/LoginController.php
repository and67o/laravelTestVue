<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginStoreRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function __construct()
    {
//        $this->middleware('guest');
    }

    /**
     * @param LoginStoreRequest $request
     * @return JsonResponse
     */
    public function login(LoginStoreRequest $request)
    {
        $response = [
            'result' => false,
            'token' => '',
            'error' => '',
        ];
        $input = $request->all();

        $validator = Validator::make($input, $this->rules());
        if ($validator->fails()) {
            $response['error'] = $validator->errors()->getMessages();
            return response()->json(
                $response,
                422
            );
        }

        if (!Auth::attempt(
            [
                'email' => $input['email'],
                'password' => $input['password']
            ])
        ) {
            $response['error'] = 'Unauthorised';
            return response()->json(
                $response,
                401
            );
        }

        $user = Auth::user();
        $response['token'] = $user->createToken('AppName')->accessToken;
        $response['result'] = $user->id;
        return response()->json(
            $response,
            200
        );
    }

    private function rules() {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }

    /**
     * @return void
     */
    public function logout()
    {
        Auth::logout();
    }

}
