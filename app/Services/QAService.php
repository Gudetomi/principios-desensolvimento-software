<?php
declare(strict_types=1);
namespace App\Services;

use LLPhant\Chat\MistralAIChat;
use LLPhant\Embeddings\DataReader\FileDataReader;
use LLPhant\Embeddings\DocumentSplitter\DocumentSplitter;
use LLPhant\OpenAIConfig;
use LLPhant\Embeddings\EmbeddingGenerator\Mistral\MistralEmbeddingGenerator;
use LLPhant\Query\SemanticSearch\QuestionAnswering;
use LLPhant\Embeddings\VectorStores\AstraDB\AstraDBVectorStore;
use LLPhant\Embeddings\VectorStores\AstraDB\AstraDBClient;
use LLPhant\Embeddings\Document;
use LLPhant\Embeddings\EmbeddingFormatter\EmbeddingFormatter;
use LLPhant\Embeddings\EmbeddingGenerator\EmbeddingGeneratorInterface;

class QAService
{
    protected $qa;

    public function __construct()
    {
        $dataReader = new FileDataReader(__DIR__.'/../documents/private-data.txt');
        $documents = $dataReader->getDocuments();
        $splitDocuments = DocumentSplitter::splitDocuments($documents, 100);
        $formattedDocuments = EmbeddingFormatter::formatEmbeddings($splitDocuments);
    
        $embeddingGenerator = new MistralEmbeddingGenerator();
        $embeddedDocuments = $embeddingGenerator->embedDocuments($formattedDocuments);
    
        $vectorStore = $this->getCleanVectorStoreForCollectionCompatibleWith($embeddingGenerator);
        $vectorStore->addDocuments($embeddedDocuments);

        $chat = $this->defineChat();

        $this->qa = new QuestionAnswering(
            $vectorStore,
            $embeddingGenerator,
            $chat
        );
        
    }

    public function getQA()
    {
        return $this->qa;
    }

    protected function defineChat(){

        $config = new OpenAIConfig();
        $config->model = 'open-mistral-7b';
        $config->apiKey = getenv('MISTRAL_API_KEY');

        $chat = new MistralAIChat($config);
        return $chat;
    }
    public function getCleanVectorStoreForCollectionCompatibleWith(EmbeddingGeneratorInterface $embeddingGenerator): AstraDBVectorStore{
    $vectorStore = new AstraDBVectorStore(new AstraDBClient(collectionName: 'collection_'.$embeddingGenerator->getEmbeddingLength()));

    $currentEmbeddingLength = $vectorStore->getEmbeddingLength();
    if ($currentEmbeddingLength === 0) {
        $vectorStore->createCollection($embeddingGenerator->getEmbeddingLength());
    } elseif ($embeddingGenerator->getEmbeddingLength() !== $currentEmbeddingLength) {
        $vectorStore->deleteCollection();
        $vectorStore->createCollection($embeddingGenerator->getEmbeddingLength());
    }

    $vectorStore->cleanCollection();

    return $vectorStore;
}
}
