<?php

namespace App\Http\Controllers;

use LLPhant\Chat\MistralAIChat;
use LLPhant\Embeddings\DataReader\FileDataReader;
use LLPhant\Embeddings\DocumentSplitter\DocumentSplitter;
use LLPhant\OpenAIConfig;
use LLPhant\Embeddings\EmbeddingGenerator\Mistral\MistralEmbeddingGenerator;
use LLPhant\Embeddings\VectorStores\Memory\MemoryVectorStore;
use LLPhant\Query\SemanticSearch\QuestionAnswering;
class RagController extends Controller
{
    public function initRag($pergunta){

        $dataReader = new FileDataReader(__DIR__.'/../documents/private-data.txt');
        $documents = $dataReader->getDocuments();

        $splitDocuments = DocumentSplitter::splitDocuments($documents, 500);
        
        $embeddingGenerator = new MistralEmbeddingGenerator();
        $embeddedDocuments = $embeddingGenerator->embedDocuments($splitDocuments);
        
        $memoryVectorStore = new MemoryVectorStore();
        $memoryVectorStore->addDocuments($embeddedDocuments);
        $config = new OpenAIConfig();
        $config->model = 'open-mistral-7b';
        $config->apiKey = getenv('MISTRAL_API_KEY');

        $chat = new MistralAIChat($config);

        $qa = new QuestionAnswering(
            $memoryVectorStore,
            $embeddingGenerator,
            $chat
        );

        $answer = $qa->answerQuestion($pergunta);
        return $answer;
    }

    public function buildPrompt(){
        $prompt="Você é um assistente pessoal para saúde. Dada a pergunta do usuário responda de acordo com o contexto incluindo citações diretas do texto. Use o contexto para responder as informações. Responda em português do Brasil. ";
        return $prompt;
    }
}
