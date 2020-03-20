<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function register(Request $request)
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

        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $response['token'] = $user->createToken('AppName')->accessToken;
        $response['result'] = true;
        return response()->json(
            $response,
            200
        );
    }

    /**
     * @return array
     */
    private function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ];
    }
}
