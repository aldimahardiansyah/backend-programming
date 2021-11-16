<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function register(Request $request)
    {
        $input = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        User::create($input);

        $data = [
            'message' => 'Register is successfully'
        ];

        return response()->json($data, 200);
    }

    function login(Request $request)
    {
        $input = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $user = User::where('email', $input['email'])->first();

        # memvalidasi apakah data pada tabel user sama dengan data dalam variabel input
        if (Auth::attempt($input)) {
            $token = $user->createToken('auth_token');

            $data = [
                'message' => 'login is successfully',
                'token' => $token->plainTextToken
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'login is invalid'
            ];

            return response()->json($data, 401);
        }
    }
}
