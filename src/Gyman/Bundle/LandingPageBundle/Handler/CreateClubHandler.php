<?php
namespace Gyman\Bundle\LandingPageBundle\Handler;

use Doctrine\DBAL\Connection;
use FOS\UserBundle\Util\UserManipulator;
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
        $user = $this->manipulator->create(
            $command->username,
            $command->password,
            $command->email,
            true,
            false
        );

        $this->manipulator->addRole($command->username, "ROLE_ADMIN");

        $dbName = sprintf("gyman_%s", $command->subdomain);
        $dbPassword = substr(str_shuffle("abcdefghijklmnoprstuwqxyzABCDEFGHIJKLMNOPRSTUVWXYZ0123456789!.,;#()[]_!.,;#()[]_"), 0, 16);

        $club = $this->factory->createFromArray([
            "name" => $command->club,
            "sections" => [],
            "owners" => [$user],
            "subdomain" => $command->subdomain,
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
                'email_address' => $command->email,
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

        $this->createSchema($command->subdomain);
        $this->loadFixtures($command->subdomain);
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

    private function createSchema($club)
    {
        $application = new Application($this->kernel);
        $application->setAutoExit(false);

        $input = new ArrayInput([
            'command' => 'doctrine:schema:create',
            '--no-interaction' => true,
            '--club' => $club,
            '--em' => 'tenant',
            '--no-ansi' => true,
            '--env' => 'prod',
            '--no-debug' => true,
        ]);

        $output = new BufferedOutput();
        $application->run($input, $output);

        $this->logger->notice($output->fetch());
    }

    private function loadFixtures($club)
    {
        $application = new Application($this->kernel);
        $application->setAutoExit(false);

        $input = new ArrayInput([
            'command' => 'doctrine:fixtures:load',
            '--no-interaction' => true,
            '--club' => $club,
            '--em' => 'tenant',
            '--no-ansi' => true,
            '--env' => 'prod',
            '--no-debug' => true,
            '--fixtures' => '../app/DoctrineFixtures/ORM/'
        ]);

        $output = new BufferedOutput();
        $application->run($input, $output);

        $this->logger->notice($output->fetch());
    }
}