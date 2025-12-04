<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Testing\Fluent\Concerns\Has;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        /*Validar los datos de entrada*/

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        /*Crear el usuario dentro de la base*/
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        /*Crear un token para que el usuario se pueda loguear automaticamente*/
        $token = $user->createToken('auth_token')->plainTextToken;

        /*Retornar la respuesta con el token y la información del usuario*/
        return response()->json([
            'mensage' => 'Usuario registrado exitosamente',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user
        ], 201);
    }

    public function login(Request $request)
    {
        //Validar los datos de entrada
        $credential = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        //Intentar autenticar al usuario
        if (Auth::attempt($credential)) {
            $user = User::where('email', $request->email)->first();

            //Eliminar todos los tokens anteriores
            $user->tokens()->delete();

            //Crear un nuevo token
            $token = $user->createToken('auth_token')->plainTextToken;

            //Retornar la respuesta con el token y la información del usuario
            return response()->json([
                'mensage' => 'Inicio de sesión exitoso',
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => [
                    $id = $user->id,
                    $name = $user->name,
                    $email = $user->email
                ]
            ], 200);
        }

        return response()->json([
            'message' => 'Credenciales inválidas'
        ], 401);
    }

    public function logout(Request $request)
    {
        //Eliminar el token de autenticación del usuario
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Cierre de sesión exitoso'
        ], 200);
    }
}
