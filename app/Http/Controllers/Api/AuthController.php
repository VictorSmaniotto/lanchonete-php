<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $usuario = Auth::user(); //Retorna as informações do usuário autenticado

            return response()->json([
                'status' => true,
                'nome' => $usuario->nome,
                'email' => $usuario->email,
                'imagem' => url($usuario->imagem),
                'token' => $usuario->createToken('AppLanchonete')->plainTextToken
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'mensagem' => "Usuário não autorizado"
            ], 401);
        };
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'mensagem' => "Logout realizado com sucesso"
        ]);
    }
}
