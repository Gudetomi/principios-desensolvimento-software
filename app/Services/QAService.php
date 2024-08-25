<?php
declare(strict_types=1);
namespace App\Services;

use LLPhant\Chat\MistralAIChat;
use LLPhant\Embeddings\DataReader\FileDataReader;
use LLPhant\Embeddings\DocumentSplitter\DocumentSplitter;
use LLPhant\OpenAIConfig;
use LLPhant\Embeddings\EmbeddingGenerator\Mistral\MistralEmbeddingGenerator;
use LLPhant\Query\SemanticSearch\QuestionAnswering;
use LLPhant\Embeddings\VectorStores\Doctrine\DoctrineVectorStore;

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use App\Entities\PlaceEntity;

class QAService
{
    protected $qa;

    public function __construct()
    {
        $config = ORMSetup::createAttributeMetadataConfiguration(
            [__DIR__.'/Entities'],
            true
        );

        $connectionParams = $this->getConnectionParams();

        $connection = DriverManager::getConnection($connectionParams);

        $entityManager = new EntityManager($connection, $config);

        $dataReader = new FileDataReader(__DIR__.'/../documents/private-data.txt');
        $documents = $dataReader->getDocuments();

        $splitDocuments = DocumentSplitter::splitDocuments($documents, 500);

        $embeddingGenerator = new MistralEmbeddingGenerator();
        $embeddedDocuments = $embeddingGenerator->embedDocuments($splitDocuments);

        $vectorStore = new DoctrineVectorStore($entityManager, PlaceEntity::class);
        $vectorStore->addDocuments($embeddedDocuments);

        $config = new OpenAIConfig();
        $config->model = 'open-mistral-7b';
        $config->apiKey = getenv('MISTRAL_API_KEY');

        $chat = new MistralAIChat($config);

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

    protected function getConnectionParams(){

        $connectionParams = [
            'dbname' => getenv('DB_DATABASE'),
            'user' => getenv('DB_USERNAME'),
            'password' => getenv('DB_PASSWORD'),
            'host' => getenv('DB_HOST'),
            'driver' => 'pdo_pgsql',
        ];

        return $connectionParams;
    }
}
