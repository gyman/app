<?php
namespace Gyman\Bundle\LandingPageBundle\Handler;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Statement;
use FOS\UserBundle\Util\UserManipulator;
use Gyman\Application\Command\CreateClubCommand;
use Gyman\Bundle\ClubBundle\Entity\ClubRepository;
use Gyman\Bundle\ClubBundle\Factory\ClubFactory;
use PDO;

class CreateClubHandler
{
    /** @var  UserManipulator */
    private $manipulator;

    /** @var  ClubFactory */
    private $factory;

    /** @var  ClubRepository */
    private $clubRepository;

    /** @var Connection */
    private $connection;

    /**
     * CreateClubHandler constructor.
     * @param UserManipulator $manipulator
     * @param ClubFactory $factory
     * @param ClubRepository $clubRepository
     * @param Connection $connection
     */
    public function __construct(UserManipulator $manipulator, ClubFactory $factory, ClubRepository $clubRepository, Connection $connection)
    {
        $this->manipulator = $manipulator;
        $this->factory = $factory;
        $this->clubRepository = $clubRepository;
        $this->connection = $connection;
    }

    /**
     * @param CreateClubCommand $command
     */
    public function handle(CreateClubCommand $command){
        $user = $this->manipulator->create(
            $command->username,
            $command->password,
            $command->email,
            false,
            false
        );

        $dbName = sprintf("gyman_%s", $command->subdomain);
        $dbPassword = substr(str_shuffle("abcdefghijklmnoprstuwqxyzABCDEFGHIJKLMNOPRSTUVWXYZ0123456789"), 0, 12);

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
                'country' => null,
                'phone_number' => null,
                'email_address' => null,
                'opened_from' => null,
                'opened_till' => null,
                'logo' => null,
                'about' => null,
                'account_number' => null,
            ]
        ]);

        $this->connection->beginTransaction();

        try {
            $this->clubRepository->save($club);
            $this->connection->getSchemaManager()->createDatabase($dbName);
            $this->bindUserToDatabase($dbName, $dbName, $dbPassword);

            // switch connection
            // create schema
            // load fixtures
            
            $this->connection->commit();
        } catch (\Exception $e) {
            $this->connection->rollBack();
            throw $e;
        }

    }

    /**
     * @param $database
     * @param $username
     * @param $password
     * @throws \Doctrine\DBAL\DBALException
     */
    private function bindUserToDatabase($database, $username, $password)
    {
        $sql = "GRANT SELECT, INSERT, UPDATE, DELETE ON %%database%% . * TO :username@'localhost' IDENTIFIED BY :password;";
        $sql = str_replace("%%database%%", $database, $sql);

        $statement = $this->connection->prepare($sql);
        $statement->bindValue("username", $username);
        $statement->bindValue("password", $password);
        $statement->execute();
    }
}