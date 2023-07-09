<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PassportAuthController extends Controller
{

    public function register(Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'unique:users,email'],
                'password' => ['required', 'confirmed', Password::defaults()],
            ]
        );

        $user = User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]
        );

        $token = $user->createToken('Token')->accessToken;
        return response()->json(['token' => $token], 200);
    }

    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (auth()->attempt($credentials)) {
            $token = auth()->user()->createToken('Token')->accessToken;
            return response()->json(['token' => $token], 200);
        }else{
            return response()->json(['error' => 'Credenciales erroneas'], 401);
        }

    }

    public function logout(){
        $token = auth()->user()->token();
        $token->revoke();
        return response()->json(['message' => 'Sesion cerrada correctamente'], 200);
    }

    public function index(){
        $users = User::all();
        return response()->json(['users' => $users], 200);
    }

    public function show($id){
        $user = User::find($id);
        if($user){
            return response()->json(['message'=> 'Usuario encontrado'], 200);
        }else{
            return response()->json(['message'=> 'Usuario no encontrado'], 404);
        }
    }
}
