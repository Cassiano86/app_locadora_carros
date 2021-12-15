<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ControllerLogin extends Controller
{
    public function login(Request $request){
        $dados = $request->all(['email','password']);

        return response()->json(['success' => auth('api')->attempt($dados) ]);

        //Verificando o token que está em config auth.php, a verificação em api é feito na tabela users
        $token = auth('api')->attempt($dados);

        if ($token) {
            return response()->json(['success' => $token]);
        } else {
            return response()->json(['error' => 'Usuário e/ou senha inválido(s)'], 403);
        }
        

    }

    public function logout(){
        auth('api')->logout();
        return response()->json(['msg' => 'Logout realizado com sucesso.']);
    }

    //Atualizando o token
    public function refresh(){
        $token = auth('api')->refresh();
        return response()->json(['token' => $token]);
    }

    public function me(){
        return response()->json(auth()->user());
    }
}
