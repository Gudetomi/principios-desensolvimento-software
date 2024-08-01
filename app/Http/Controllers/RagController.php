<?php

namespace App\Http\Controllers;

use LLPhant\Chat\OpenAIChat;
use LLPhant\Embeddings\DataReader\FileDataReader;
use LLPhant\Embeddings\DocumentSplitter\DocumentSplitter;
use LLPhant\Embeddings\EmbeddingGenerator\OpenAI\OpenAI3SmallEmbeddingGenerator;
use LLPhant\Embeddings\VectorStores\FileSystem\FileSystemVectorStore;
use LLPhant\Query\SemanticSearch\QuestionAnswering;

class RagController extends Controller
{
    public function initRag($pergunta){

        $dataReader = new FileDataReader(__DIR__.'/private-data.txt');
        $documents = $dataReader->getDocuments();
        
        $splitDocuments = DocumentSplitter::splitDocuments($documents, 500);
        
        $embeddingGenerator = new OpenAI3SmallEmbeddingGenerator();
        $embeddedDocuments = $embeddingGenerator->embedDocuments($splitDocuments);
        
        $memoryVectorStore = new FileSystemVectorStore();
        $memoryVectorStore->addDocuments($embeddedDocuments);

        $qa = new QuestionAnswering(
            $memoryVectorStore,
            $embeddingGenerator,
            new OpenAIChat()
        );
        
        $answer = $qa->answerQuestion($pergunta);

        return $answer;
    }
}
