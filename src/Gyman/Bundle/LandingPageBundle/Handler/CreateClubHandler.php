<?php
namespace Gyman\Bundle\LandingPageBundle\Handler;

use Doctrine\DBAL\Connection;
use Exception;
use FOS\UserBundle\Util\UserManipulator;
use Gyman\Bundle\ClubBundle\Entity\User;
use Gyman\Bundle\ClubBundle\Entity\UserRepository;
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
    private $fosUserManipulator;

    /** @var  ClubFactory */
    private $clubFactory;

    /** @var  ClubRepository */
    private $clubRepository;

    /** @var Connection */
    private $defaultConnection;

    /** @var Connection */
    private $maintenanceConnection;

    /** @var LoggerInterface */
    private $logger;

    /** @var UserRepository */
    private $userRepository;

    /**
     * CreateClubHandler constructor.
     * @param Kernel $kernel
     * @param UserManipulator $fosUserManipulator
     * @param ClubFactory $clubFactory
     * @param ClubRepository $clubRepository
     * @param Connection $maintenanceConnection
     */
    public function __construct(Kernel $kernel, UserManipulator $fosUserManipulator, ClubFactory $clubFactory, UserRepository $userRepository, ClubRepository $clubRepository, Connection $defaultConnection, Connection $maintenanceConnection, LoggerInterface $logger)
    {
        $this->kernel = $kernel;
        $this->fosUserManipulator = $fosUserManipulator;
        $this->clubFactory = $clubFactory;
        $this->userRepository = $userRepository;
        $this->clubRepository = $clubRepository;
        $this->defaultConnection = $defaultConnection;
        $this->maintenanceConnection = $maintenanceConnection;
        $this->logger = $logger;
    }

    /**
     * @param CreateClubCommand $command
     * @throws \Doctrine\DBAL\ConnectionException
     * @throws \Exception
     */
    public function handle(CreateClubCommand $command){
        
        $this->defaultConnection->beginTransaction();
        
        try {
            /** @var User $user */
            $user = $this->prepareUser($command);
            $this->logger->notice('User ready for new club', ['user' => $user]);

            $this->fosUserManipulator->addRole($command->getUsername(), "ROLE_ADMIN");

            $club = $this->prepareClub($command, $user);
            $this->clubRepository->save($club);

            $this->logger->notice('Club created', ['club' => $club->getSubdomain()]);

            $existingDatabases = $this->maintenanceConnection->getSchemaManager()->listDatabases();
            $dbName = $club->getDatabase()->getName();

            if(in_array($dbName, $existingDatabases)) {
                throw new Exception(sprintf("Database %s already exists.", $dbName));
            }

            $this->maintenanceConnection->getSchemaManager()->createDatabase($dbName);

            $this->logger->notice('Db created', ['name' => $dbName]);

            $this->bindUserToDatabase(
                $dbName,
                $dbName,
                $club->getDatabase()->getPassword()
            );

            $this->createSchema($command->getSubdomain());
            $this->logger->notice('Db schema created', ['name' => $dbName]);
            $this->loadFixtures($command->getSubdomain());
            $this->logger->notice('Fixtures loaded', ['name' => $dbName]);
        } catch (Exception $e) {
            $this->defaultConnection->rollback();
            $this->dropDb($command->getClub());
            $this->logger->error(sprintf('Error while registering a new club: %s.', $e->getMessage()));
            
            throw new CantRegisterNewClub($e);
        }

        $this->defaultConnection->commit();
    }

    /**
     * @param $database
     * @param $username
     * @param $password
     * @throws \Doctrine\DBAL\DBALException
     */
    private function bindUserToDatabase($database, $username, $password)
    {
        $sql = "GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, ALTER ON `%%database%%` . `*` TO `%%username%%`@`%` IDENTIFIED BY \"%%password%%\";";
        $sql = str_replace("%%database%%", trim($database), $sql);
        $sql = str_replace("%%username%%", trim($username), $sql);
        $sql = str_replace("%%password%%", trim($password), $sql);

        $statement = $this->maintenanceConnection->prepare($sql);
        $statement->execute();
    }

    private function dropDb($club)
    {
        $this->runCommand([
            'command' => 'doctrine:database:drop',
            '--no-interaction' => true,
            '--club' => $club,
            '--connection' => "tenant",
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

    private function prepareUser(CreateClubCommand $command)
    {
        if($user = $this->userRepository->findOneByUsername($command->getUsername())) {
            return $user;
        }

        return $this->fosUserManipulator->create(
            $command->getUsername(),
            $command->getPassword(),
            $command->getEmail(),
            true,
            false
        );
    }

    private function prepareClub(CreateClubCommand $command, User $user)
    {
        $dbName = sprintf("gyman_%s", $command->getSubdomain());
        $dbPassword = substr(str_shuffle(str_repeat("abcdefghijklmnoprstuwqxyzABCDEFGHIJKLMNOPRSTUVWXYZ0123456789!.,;#()[]_!.,;#()[]_", 10)), 0, 32);

        $club = $this->clubFactory->createFromArray([
            "name" => $command->getClub() ?: '',
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

        return $club;
    }
}