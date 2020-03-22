<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request)
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

        if (!Auth::attempt([
            'email' => $input['email'],
            'password' => $input['password']
        ])) {
            $response['error'] = 'Unauthorised';
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
     * @return array
     */
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
