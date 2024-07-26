<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LucianoTonet\GroqPHP\Groq;

class GroqController extends Controller
{
    public function initGroq($pergunta){
        $groq = new Groq();
        $models = $groq->models()->list();

        foreach ($models['data'] as $model) {
            echo 'Model ID: ' . $model['id'] . PHP_EOL;
            echo 'Developer: ' . $model['owned_by'] . PHP_EOL;
            echo 'Context window: ' . $model['context_window'] . PHP_EOL;
        }
    }
}
