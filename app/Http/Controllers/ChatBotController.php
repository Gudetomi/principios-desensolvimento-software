<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatBotController extends Controller
{
    public function pergunta(Request $request){
        $dados = $request->only('pergunta');
        $groq = new \App\Http\Controllers\GroqController();
        $resposta = $groq->initGroq($dados['pergunta']);
        return json_encode($resposta);
    }
}
