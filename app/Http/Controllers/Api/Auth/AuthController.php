<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rules;

class AuthController extends Controller
{
    public function auth(Request $request)
    {

        $credenciais = $request->only([
            'email',
            'password',
            'device_name',
        ]);

        $user = User::where('email', $request->email)->first();

        Hash::check($request->password, $user->password);

        if(!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'menssagem' => 'Credenciais Inválidas.'
            ]);
        }

        $user->tokens()->delete();

        $token = $user->createToken($request->device_name)->plainTextToken;

        return response()->json([
            'token' => $token,
        ]);
    }

    public function store(Request $request)
    {
        //precisa enviar o "password_confirmation": "********" no json

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return response()->json([
            'menssagem' => 'Usuário criado com sucesso.',
            'nome' => $request->name,
            'email' => $request->email,
        ]);
    }

    public function logout(Request $request)
    {
        $user = $request->user();

        $user->tokens()->delete();

        return response()->json([
            'mensagem' => 'Logout realizado com sucesso.'
        ]);
    }
}
