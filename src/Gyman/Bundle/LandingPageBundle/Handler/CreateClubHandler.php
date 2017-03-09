<?php
namespace Gyman\Bundle\LandingPageBundle\Handler;

use Doctrine\DBAL\Connection;
use Exception;
use FOS\UserBundle\Util\UserManipulator;
use Gyman\Bundle\LandingPageBundle\Exception\CantRegisterNewClub;
use Gyman\Application\Command\CreateClubCommand;
use Gyman\Bundle\ClubBundle\Entity\ClubRepository;
use Gyman\Bundle\ClubBundle\Factory\ClubFactory;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\HttpKernel\Kernel;

class CreateClubHandler
{
    /** @var Kernel */
    private $kernel;

    /** @var  UserManipulator */
    private $manipulator;

    /** @var  ClubFactory */
    private $factory;

    /** @var  ClubRepository */
    private $clubRepository;

    /** @var Connection */
    private $connection;

    /** @var LoggerInterface */
    private $logger;

    /**
     * CreateClubHandler constructor.
     * @param Kernel $kernel
     * @param UserManipulator $manipulator
     * @param ClubFactory $factory
     * @param ClubRepository $clubRepository
     * @param Connection $connection
     */
    public function __construct(Kernel $kernel, UserManipulator $manipulator, ClubFactory $factory, ClubRepository $clubRepository, Connection $connection, LoggerInterface $logger)
    {
        $this->kernel = $kernel;
        $this->manipulator = $manipulator;
        $this->factory = $factory;
        $this->clubRepository = $clubRepository;
        $this->connection = $connection;
        $this->logger = $logger;
    }

    /**
     * @param CreateClubCommand $command
     * @throws \Doctrine\DBAL\ConnectionException
     * @throws \Exception
     */
    public function handle(CreateClubCommand $command){
        
        $this->connection->beginTransaction();
        
        try {
            $user = $this->manipulator->create(
                $command->getUsername(),
                $command->getPassword(),
                $command->getEmail(),
                true,
                false
            );

            $this->manipulator->addRole($command->getUsername(), "ROLE_ADMIN");

            $dbName = sprintf("gyman_%s", $command->getSubdomain());
            $dbPassword = substr(str_shuffle("abcdefghijklmnoprstuwqxyzABCDEFGHIJKLMNOPRSTUVWXYZ0123456789!.,;#()[]_!.,;#()[]_"), 0, 16);

            $club = $this->factory->createFromArray([
                "name" => $command->getClub(),
                "sections" => [],
                "owners" => [$user],
                "subdomain" => $command->getSubdomain(),
                "database" => [
                    "name" => $dbName,
                    "user" => $dbName,
                    "password" => $dbPassword
                ],
                "details" => [
                    'address' => null,
                    'zipcode' => null,
                    'city' => null,
                    'country' => "Polska",
                    'phone_number' => null,
                    'email_address' => $command->getEmail(),
                    'opened_from' => "11:00",
                    'opened_till' => "18:00",
                    'logo' => null,
                    'about' => null,
                    'account_number' => null,
                ]
            ]);

            $this->clubRepository->save($club);
            $this->connection->getSchemaManager()->createDatabase($dbName);
            $this->bindUserToDatabase($dbName, $dbName, $dbPassword);

            $this->createSchema($command->getSubdomain());
            $this->loadFixtures($command->getSubdomain());

        } catch (Exception $e) {
            $this->connection->rollback();
            $this->dropDb($command->getClub());
            $this->logger->error(sprintf('Error while registering a new club: %s.', $e->getMessage()));
            
            throw new CantRegisterNewClub($e);
        }

        $this->connection->commit();
        
    }

    /**
     * @param $database
     * @param $username
     * @param $password
     * @throws \Doctrine\DBAL\DBALException
     */
    private function bindUserToDatabase($database, $username, $password)
    {
        $sql = "GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, ALTER ON %%database%% . * TO :username@'localhost' IDENTIFIED BY :password;";
        $sql = str_replace("%%database%%", trim($database), $sql);

        $statement = $this->connection->prepare($sql);
        $statement->bindValue("username", $username);
        $statement->bindValue("password", $password);
        $statement->execute();
    }

    private function dropDb($club)
    {
        $this->runCommand([
            'command' => 'doctrine:database:drop',
            '--no-interaction' => true,
            '--club' => $club,
            '--no-ansi' => true,
            '--force' => true,
            '--env' => 'prod',
            '--no-debug' => true,
            '--if-exists' => true,
        ]);
    }

    private function createSchema($club)
    {
        $this->runCommand([
            'command' => 'doctrine:schema:create',
            '--no-interaction' => true,
            '--club' => $club,
            '--no-ansi' => true,
            '--env' => 'prod',
            '--no-debug' => true,
        ]);
    }

    private function loadFixtures($club)
    {
        $this->runCommand([
            'command' => 'doctrine:fixtures:load',
            '--no-interaction' => true,
            '--club' => $club,
            '--no-ansi' => true,
            '--env' => 'prod',
            '--no-debug' => true,
            '--fixtures' => '../app/DoctrineFixtures/ORM/'
        ]);
    }

    private function runCommand(array $params = [])
    {
        $application = new Application($this->kernel);
        $application->setAutoExit(false);

        $input = new ArrayInput($params);

        $output = new BufferedOutput();
        $application->run($input, $output);

        $this->logger->notice($output->fetch());
    }
}