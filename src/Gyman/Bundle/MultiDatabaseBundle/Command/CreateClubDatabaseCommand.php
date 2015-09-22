<?php
namespace Gyman\Bundle\MultiDatabaseBundle\Command;

use Gyman\Bundle\ClubBundle\Entity\Club;
use Gyman\Bundle\ClubBundle\Entity\Database;
use Gyman\Bundle\ClubBundle\Entity\Subdomain;
use PDO;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateClubDatabaseCommand extends AbstractCommand
{


    protected function configure()
    {
        $this
            ->setName('gyman:club:create')
            ->setDescription('Creates database with empty schema for club on selected name')
            ->addArgument('name', InputArgument::REQUIRED, 'Club name')
            ->addArgument('subdomain', InputArgument::REQUIRED, 'Subdomain name')
            ->addArgument('db-name', InputArgument::REQUIRED, 'Database name')
            ->addArgument('db-user', InputArgument::REQUIRED, 'Database username')
            ->addArgument('db-password', InputArgument::REQUIRED, 'Database password')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $arguments = $input->getArguments();

        $connection = $this->getContainer()->get("doctrine.dbal.default_connection");

        $manager = $this->getContainer()->get("doctrine.orm.default_entity_manager");
        $connection->beginTransaction();

        try {
            $club = new Club(
                null,
                $arguments["name"],
                [],
                [],
                new Subdomain($arguments["subdomain"]),
                new Database(
                    $arguments['db-name'],
                    $arguments['db-user'],
                    $arguments['db-password']
                )
            );

            $manager->persist($club);
            $manager->flush();

            $connection->exec(sprintf('CREATE DATABASE `%s`;', $arguments['db-name']));
            $connection->exec(sprintf("CREATE USER '%s'@'localhost' IDENTIFIED BY '%s';", $arguments['db-user'], $arguments["db-password"]));
            $connection->exec(sprintf("GRANT ALL ON `%s`.* TO '%s'@'localhost'", $arguments['db-name'], $arguments["db-user"]));
            $connection->exec('FLUSH PRIVILEGES;');
        } catch (\Exception $e) {
            $connection->rollBack();
            throw $e;
        }

        $connection->commit();
    }
}
