<?php

namespace App\Http\Controllers;

use LLPhant\Chat\MistralAIChat;
use LLPhant\Embeddings\DataReader\FileDataReader;
use LLPhant\Embeddings\DocumentSplitter\DocumentSplitter;
use LLPhant\OpenAIConfig;
use LLPhant\Embeddings\EmbeddingGenerator\Mistral\MistralEmbeddingGenerator;
use LLPhant\Embeddings\VectorStores\Memory\MemoryVectorStore;
use LLPhant\Query\SemanticSearch\QuestionAnswering;

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
