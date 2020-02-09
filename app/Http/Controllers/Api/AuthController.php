<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function register(Request $request)
    {
        try {
            $response = [
                'result' => false,
                'token' => '',
                'error' => '',
            ];
            $input = $request->all();
            $validator = Validator::make($input, $this->_rulesRegister());
            if ($validator->fails()) {
                throw new Exception($validator->errors()->first());
            }

            $input['password'] = bcrypt($input['password']);
            $user = User::create($input);
            if (!$user) {
                throw new Exception('Trouble with register');
            }

            $response['token'] = $user->createToken('AppName')->accessToken;
            $response['result'] = true;

            return response()->json($response,200);
        } catch (Exception $exception) {
            $response['error'] = $exception->getMessage();
            return response()->json($response,401);
        }
    }

    /**
     * @return array
     */
    private function _rulesRegister()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ];
    }

    private function rules() {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws Exception
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
            $response[ 'error'] = $validator->errors()->getMessages();
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
            $response['error'] ='Unauthorised';
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

    public function logout()
    {
        return true;
    }

}
