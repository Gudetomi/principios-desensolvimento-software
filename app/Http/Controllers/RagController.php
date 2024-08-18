<?php

namespace App\Http\Controllers;

use App\Services\QAService;
class RagController extends Controller
{
    public function initRag($pergunta){

        $qaService = app(QAService::class);
        $qa = $qaService->getQA();

        $answer = $qa->answerQuestion($pergunta);
        return $answer;
    }

}
