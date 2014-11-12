<?php
namespace Gyman\Bundle\DefaultBundle\Services;


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\SchemaTool;
use Gyman\Bundle\DefaultBundle\Connection\ConnectionWrapper;
use SebastianBergmann\Exporter\Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\ConsoleOutput;

class DatabaseWorker {

    const QUERY_CREATE_DB = 'CREATE DATABASE IF NOT EXISTS `{{name}}`;';

    /**
     * @var string $dbName
     */
    public $dbName;

    /**
     * @var string $username
     */
    private $username;

    /**
     * @var string $password
     */
    private $password;

    /**
     * @var string $clubDatabaseNameTemplate
     */
    private $clubDatabaseNameTemplate;

    /**
     * @var Slugify $slugifier
     */
    private $slugifier;

    /**
     * @var EntityManager $clubEntityManager
     */
    private $clubEntityManager;

    /**
     * @var EntityManager $clubEntityManager
     */
    private $defaultEntityManager;

    /**
     * @var ConnectionWrapper $clubConnection
     */
    private $clubConnection;

    /**
     * @var Connection $connection
     */
    private $defaultConnection;

    function __construct($clubDatabaseNameTemplate, $username, $password)
    {
        $this->clubDatabaseNameTemplate = $clubDatabaseNameTemplate;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Setup database for given club name
     * @param $clubName
     */
    public function setupDatabase($clubName) {
        $this->dbName = $this->createDatabaseName($clubName);

        $this->createDatabase();
        $this->updateClubConnection();
        $this->createSchema();
    }

    public function loadFixtures($clubName, Command $command, ConsoleOutput $output, $env = 'dev')
    {
        $this->dbName = $this->createDatabaseName($clubName);
        $this->updateClubConnection();

        $input = new ArrayInput([
            "--fixtures" => 'src/Gyman/Bundle/TestBundle/DataFixtures/Club',
            "--em" => 'club',
            "--no-interaction",
            "--env" => $env,
        ]);

        $output->writeln((string) $input);

        $command->run($input, $output);
    }

    /**
     * Creates database
     */
    public function createDatabase() {
        $this->defaultConnection->exec(
            $this->getCreateDatabaseQuery($this->dbName)
        );
    }

    /**
     * Creates schema in existing database
     * @throws \Doctrine\ORM\Tools\ToolsException
     */
    public function createSchema() {
        $metadatas = $this->clubEntityManager->getMetadataFactory()->getAllMetadata();

        if ( ! empty($metadatas)) {
            $tool = new SchemaTool($this->clubEntityManager);
            $tool->createSchema($metadatas);
        } else {
            throw new Exception('No Metadata Classes to process.');
        }
    }

    /**
     * @param $dbName
     * @return string
     */
    private function getCreateDatabaseQuery($dbName)
    {
        $query = str_replace("{{name}}", $dbName, self::QUERY_CREATE_DB);
        return $query;
    }

    /**
     * @param Connection $defaultConnection
     */
    public function setDefaultConnection($defaultConnection)
    {
        $this->defaultConnection = $defaultConnection;
    }

    /**
     * @param ConnectionWrapper $connection
     */
    public function setClubConnection(ConnectionWrapper $connection)
    {
        $this->clubConnection = $connection;
    }

    /**
     * @param EntityManager $entityManager
     */
    public function setClubEntityManager(EntityManager $entityManager)
    {
        $this->clubEntityManager = $entityManager;
    }

    /**
     * @param EntityManager $defaultEntityManager
     */
    public function setDefaultEntityManager($defaultEntityManager)
    {
        $this->defaultEntityManager = $defaultEntityManager;
    }

    /**
     * @param mixed $slugifier
     */
    public function setSlugifier(Slugify $slugifier)
    {
        $this->slugifier = $slugifier;
    }

    /**
     * @param string $clubName
     * @return string mixed
     */
    protected function createDatabaseName($clubName) {
        $clubSlug = $this->slugifier->convert($clubName);
        $dbname = str_replace('{{club_name}}', $clubSlug, $this->clubDatabaseNameTemplate);
        return $dbname;
    }

    private function updateClubConnection()
    {
        $this->clubConnection->forceSwitch(
            $this->dbName,
            $this->username,
            $this->password
        );
    }

} 