<?php
namespace App\Services;

use LLPhant\Chat\MistralAIChat;
use LLPhant\Embeddings\DataReader\FileDataReader;
use LLPhant\Embeddings\DocumentSplitter\DocumentSplitter;
use LLPhant\OpenAIConfig;
use LLPhant\Embeddings\EmbeddingGenerator\Mistral\MistralEmbeddingGenerator;
use LLPhant\Embeddings\VectorStores\Memory\MemoryVectorStore;
use LLPhant\Query\SemanticSearch\QuestionAnswering;

class QAService
{
    protected $qa;

    public function __construct()
    {
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

        $this->qa = new QuestionAnswering(
            $memoryVectorStore,
            $embeddingGenerator,
            $chat
        );
        
    }

    public function getQA()
    {
        return $this->qa;
    }
}
