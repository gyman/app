<?php
namespace Gyman\Bundle\LandingPageBundle\Handler;

use Doctrine\DBAL\Connection;
use Exception;
use FOS\UserBundle\Util\UserManipulator;
use Gyman\Bundle\ClubBundle\Entity\Club;
use Gyman\Bundle\ClubBundle\Entity\Database;
use Gyman\Bundle\ClubBundle\Entity\User;
use Gyman\Bundle\ClubBundle\Entity\UserRepository;
use Gyman\Bundle\LandingPageBundle\Exception\CantRegisterNewClub;
use Gyman\Application\Command\CreateClubCommand;
use Gyman\Bundle\ClubBundle\Entity\ClubRepository;
use Gyman\Bundle\ClubBundle\Factory\ClubFactory;
use Gyman\Bundle\LandingPageBundle\Exception\CantRegisterNewClubRollback;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\HttpKernel\Kernel;

class CreateClubHandler
{
    const HOSTS = ["localhost", "%"];

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
        
        try {
            $this->assertDatabaseDoesNotExists($this->createDbName($command->subdomain));

            /** @var User $user */
            $user = $this->createUserEntity($command);
            /** @var Club $club */
            $club = $this->createClubEntity($command, $user);

            $this->createDatabase($command->subdomain);
            $this->bindMysqlUserToDatabase($club->getDatabase());

            $this->createSchema($command->subdomain);
            $this->loadFixtures($command->subdomain);
        }
        catch (CantRegisterNewClubRollback $e) {
//            $this->rollback($command->subdomain);
            $this->logger->error($e->getMessage());
            throw new CantRegisterNewClub($e);
        } catch (Exception $e) {
            $this->logger->error($e->getMessage());
            throw new CantRegisterNewClub($e);
        } finally {
            $this->logger->error(sprintf('Error while creating new database'));
        }
    }

    /**
     * @param $db
     * @param $username
     * @param $password
     * @throws \Doctrine\DBAL\DBALException
     */
    private function bindMysqlUserToDatabase(Database $db)
    {
        $createUserQueryTemplate = "CREATE USER %%username%%@'%%host%%' IDENTIFIED BY '%%password%%';";
        $grantQueryTemplate = "GRANT ALL PRIVILEGES ON %%database%%.* TO '%%username%%'@'%%host%%';";

        foreach(self::HOSTS as $host) {
            $createUserQuery = str_replace(
                ["%%username%%", "%%password%%", "%%host%%"],
                [$db->getUsername(), $db->getPassword(), $host],
                $createUserQueryTemplate
            );

            $grantQuery = str_replace(
                ["%%database%%", "%%username%%", "%%password%%", "%%host%%"],
                [$db->getName(), $db->getUsername(), $db->getPassword(), $host],
                $grantQueryTemplate
            );

            try {
                $this->runCommand([
                    'command' => 'doctrine:query:sql',
                    'sql' => $createUserQuery,
                    '--connection' => 'maintanance',
                ]);
                $this->logger->debug('Query run: ' . $createUserQuery);
                $this->runCommand([
                    'command' => 'doctrine:query:sql',
                    'sql' => $grantQuery,
                    '--connection' => 'maintanance',
                ]);
                $this->logger->debug('Query run: ' . $grantQuery);
            } catch (Exception $e) {
                $this->logger->error('Error binding user to created db');
                throw new CantRegisterNewClubRollback($e);
            }
        }

        $this->runCommand([
            'command' => 'doctrine:query:sql',
            'sql' => 'FLUSH PRIVILEGES;',
            '--connection' => 'maintanance',
        ]);

        $this->logger->debug('Query run: \'FLUSH PRIVILEGES;\'');
    }

    private function rollback($subdomain)
    {
        $existingDatabases = $this->maintenanceConnection->getSchemaManager()->listDatabases();

        if(in_array($this->createDbName($subdomain), $existingDatabases)) {
            $this->runCommand([
                'command' => 'doctrine:query:sql',
                'sql' => sprintf('DROP DATABASE %s;', $this->createDbName($subdomain)),
                '--connection' => 'maintanance',
            ]);

            $this->logger->notice(sprintf('Removed database:', $this->createDbName($subdomain)));

            foreach(self::HOSTS as $host) {
                try {
                    $this->runCommand([
                        'command' => 'doctrine:query:sql',
                        'sql' => sprintf('DROP USER "%s"@"%s";', $this->createDbName($subdomain), $host),
                        '--connection' => 'maintanance',
                    ]);
                } catch (Exception $e) {
                    $this->logger->error(sprintf('Can\'t remove mysql user "%s"@"%s"', $this->createDbName($subdomain), $host));
                    throw new CantRegisterNewClub($e);
                }

                $this->logger->notice(sprintf('Removed mysql user "%s"@"%s"', $this->createDbName($subdomain), $host));
            }
        }

        $this->clubRepository->createQueryBuilder('c')
            ->delete()
            ->where('c.subdomain.name = :subdomain')
            ->setParameter('subdomain', $subdomain)
            ->getQuery()
            ->execute();
    }

    private function createSchema($club)
    {
        try {
            $this->runCommand([
                'command' => 'doctrine:schema:create',
                '--no-interaction' => true,
                '--club' => $club,
                '--em' => 'tenant',
            ]);
        } catch (Exception $e) {
            $this->logger->notice('Creation of db schema failed', ['name' => $this->createDbName($club)]);
            throw new CantRegisterNewClubRollback($e);
        }

        $this->logger->notice('Db schema created', ['name' => $this->createDbName($club)]);
    }

    private function loadFixtures($club)
    {
        $this->runCommand([
            'command' => 'doctrine:fixtures:load',
            '--no-interaction' => true,
            '--club' => $club,
            '--em' => 'tenant',
            '--quiet' => false,
            '--fixtures' => $this->kernel->getContainer()->getParameter('kernel.root_dir') . '/DoctrineFixtures/ORM',
        ]);

        $this->logger->notice('Fixtures loaded', ['name' => $this->createDbName($club)]);
    }

    private function runCommand(array $params = [])
    {
        $application = new Application($this->kernel);
        $application->setAutoExit(false);

        $params = array_merge($params, [
            '--quiet' => true,
            '--no-ansi' => true,
            '--env' => 'prod',
            '--no-debug' => true,
        ]);

        $input = new ArrayInput($params);

        $output = new BufferedOutput();

        $this->logger->notice(sprintf('Running command "%s"', json_encode($params)));

        if($application->run($input, $output)) {
            throw new Exception(sprintf('Error running command "%s": %s', $params['command'], $output->fetch()));
        }

        $this->logger->debug(sprintf('Command "%s" output:', $params["command"], $output->fetch()));
    }

    private function createUserEntity(CreateClubCommand $command)
    {
        if($user = $this->userRepository->findOneByUsername($command->username)) {
            $this->logger->notice('User already exists', ['user' => $user]);
            return $user;
        }

        $user = $this->fosUserManipulator->create(
            $command->username,
            $command->password,
            $command->email,
            true,
            false
        );

        $this->fosUserManipulator->addRole($command->username, "ROLE_ADMIN");
        $this->logger->notice('User ready for new club', ['user' => $user]);

        return $user;
    }

    private function createClubEntity(CreateClubCommand $command, User $user)
    {
        if(null !== $this->clubRepository->findOneBySubdomain($command->subdomain)) {
            throw new Exception(sprintf('Club entity with subdomain "%s" already exists', $command->subdomain));
        }

        $dbName = $this->createDbName($command->subdomain);
        $dbPassword = substr(str_shuffle(str_repeat("abcdefghijklmnoprstuwqxyzABCDEFGHIJKLMNOPRSTUVWXYZ0123456789!.,;#()[]_!.,;#()[]_", 10)), 0, 32);

        $club = $this->clubFactory->createFromArray([
            "name" => $command->club ?: '',
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

        try {
            $this->clubRepository->save($club);
        } catch (Exception $e) {
            $this->logger->notice('Cant save new club entity');
            throw new CantRegisterNewClubRollback($e);
        }

        $this->logger->notice('Club created', ['club' => $club->getSubdomain()]);

        return $club;
    }

    private function assertDatabaseDoesNotExists($dbName)
    {
        $existingDatabases = $this->maintenanceConnection->getSchemaManager()->listDatabases();

        if(in_array($dbName, $existingDatabases)) {
            throw new Exception(sprintf("Database %s already exists.", $dbName));
        }
    }

    private function createDatabase($subdomain)
    {
        try {
            $this->runCommand([
                'command' => 'doctrine:query:sql',
                'sql' => sprintf("CREATE DATABASE %s", $this->createDbName($subdomain)),
                '--connection' => 'maintanance',
            ]);
        } catch (Exception $e) {
            $this->logger->error('Error creating db');
            throw new CantRegisterNewClubRollback($e);
        }

        $this->logger->notice('Db created', ['name' => $this->createDbName($subdomain)]);
    }

    /**
     * @param $subdomain
     * @return string
     */
    private function createDbName($subdomain)
    {
        return sprintf("gyman_%s", $subdomain);
    }
}