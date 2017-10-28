<?php declare(strict_types = 1);

namespace Gyman\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\ORM\Query;
use Gyman\Domain\User;
use Ramsey\Uuid\Uuid;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171016200041 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $usersIds = $this->connection->fetchAll('SELECT u.id FROM users u;');

        foreach($usersIds as $id) {
            if(false === Uuid::isValid($id['id'])) {
                $this->addSql('UPDATE users u SET u.id = :newId WHERE id = :oldId', [
                    "newId" => Uuid::uuid4(),
                    "oldId" => $id['id']
                ]);
            }
        }

    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
