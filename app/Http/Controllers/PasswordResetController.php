<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;

class PasswordResetController extends Controller
{

    /*Enviar un correo de restablecimiento de contraseña*/
    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? response()->json(['message' => 'Correo de restablecimiento enviado'])
            : response()->json(['message' => 'No se pudo enviar el correo de restablecimiento'], 400);
    }

    /*Restablecer la contraseña luego de que el usuario haga click en el correo de restablecimiento*/
    public function reset(Request $request)
    {
        //Validar los datos de entrada
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        //Intentar restablecer la contraseña
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );
        /*Retornar la respuesta con el mensaje de éxito o error*/
        return $status === Password::PASSWORD_RESET
            ? response()->json(['message' => 'Contraseña restablecida exitosamente'])
            : response()->json(['message' => 'No se pudo restablecer la contraseña'], 400);
    }
}
