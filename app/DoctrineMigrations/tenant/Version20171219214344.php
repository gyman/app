<?php declare(strict_types=1);

namespace Gyman\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171219214344 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE sections ADD instructor_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE sections ADD CONSTRAINT FK_2B9643988C4FC193 FOREIGN KEY (instructor_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_2B9643988C4FC193 ON sections (instructor_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE sections DROP FOREIGN KEY FK_2B9643988C4FC193');
        $this->addSql('DROP INDEX IDX_2B9643988C4FC193 ON sections');
        $this->addSql('ALTER TABLE sections DROP instructor_id');
    }
}
