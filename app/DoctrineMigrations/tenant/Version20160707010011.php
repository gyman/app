<?php

namespace Gyman\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160707010011 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE INDEX index_dende_events_dates ON events (startDate, endDate)');
        $this->addSql('CREATE INDEX index_members_barcode ON members (barcode)');
        $this->addSql('CREATE INDEX index_members_name ON members (lastname, firstname)');
        $this->addSql('CREATE INDEX index_dende_occurrences_dates ON occurrences (startDate, endDate)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX index_dende_events_dates ON events');
        $this->addSql('DROP INDEX index_members_barcode ON members');
        $this->addSql('DROP INDEX index_members_name ON members');
        $this->addSql('DROP INDEX index_dende_occurrences_dates ON occurrences');
    }
}
