<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\ApiController;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class AuthController extends ApiController
{
    // iniciar sesion
    public function Login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return $this->errorResponse('Las Credenciales son incorrectas.', 401);
        }
        $token = $user->createToken($request->email)->plainTextToken;
        return $this->showMessage([
            'message' => 'Sesion iniciada Correctamente',
            'token' => $token,
            'user' => $user,
        ]);
    }

    // cerrra sesion
    public function Logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return $this->showMessage([
            'message' => 'Sesion cerrada correctamente',
        ]);
    }

    // manda link de recuperacion
    public function recovery(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return $this->showMessage(['message' => __($status)]);
        } else {
            return $this->errorResponse(__($status), 422);
        }
    }

    // resetea contraseña
    public function reset(Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

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

        if ($status === Password::PASSWORD_RESET) {
            return $this->showMessage(['message' => __($status)]);
        } else {
            return $this->errorResponse(__($status), 422);
        }
    }
}
