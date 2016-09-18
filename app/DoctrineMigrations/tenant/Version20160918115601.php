<?php

namespace Gyman\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160918115601 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE calendars ADD deletedAt DATETIME DEFAULT NULL, CHANGE discriminator discriminator VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE events ADD previous_event_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:guid)\', ADD next_event_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:guid)\', ADD deletedAt DATETIME DEFAULT NULL, CHANGE discriminator discriminator VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE events ADD CONSTRAINT FK_5387574A6E1CF08F FOREIGN KEY (previous_event_id) REFERENCES events (id)');
        $this->addSql('ALTER TABLE events ADD CONSTRAINT FK_5387574A49EDA465 FOREIGN KEY (next_event_id) REFERENCES events (id)');
        $this->addSql('CREATE INDEX IDX_5387574A6E1CF08F ON events (previous_event_id)');
        $this->addSql('CREATE INDEX IDX_5387574A49EDA465 ON events (next_event_id)');
        $this->addSql('ALTER TABLE occurrences DROP FOREIGN KEY FK_3F04912C71F7E88B');
        $this->addSql('ALTER TABLE occurrences ADD deletedAt DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE occurrences ADD CONSTRAINT FK_3F04912C71F7E88B FOREIGN KEY (event_id) REFERENCES events (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE calendars DROP deletedAt, CHANGE discriminator discriminator VARCHAR(255) DEFAULT \'app\' NOT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE events DROP FOREIGN KEY FK_5387574A6E1CF08F');
        $this->addSql('ALTER TABLE events DROP FOREIGN KEY FK_5387574A49EDA465');
        $this->addSql('DROP INDEX IDX_5387574A6E1CF08F ON events');
        $this->addSql('DROP INDEX IDX_5387574A49EDA465 ON events');
        $this->addSql('ALTER TABLE events DROP previous_event_id, DROP next_event_id, DROP deletedAt, CHANGE discriminator discriminator VARCHAR(255) DEFAULT \'app\' NOT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE occurrences DROP FOREIGN KEY FK_3F04912C71F7E88B');
        $this->addSql('ALTER TABLE occurrences DROP deletedAt');
        $this->addSql('ALTER TABLE occurrences ADD CONSTRAINT FK_3F04912C71F7E88B FOREIGN KEY (event_id) REFERENCES events (id) ON DELETE SET NULL');
    }
}
