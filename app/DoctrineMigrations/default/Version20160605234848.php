<?php

namespace Gyman\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160605234848 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('SET foreign_key_checks = 0;');
        $this->addSql('DROP TABLE groups');
        $this->addSql('DROP TABLE users_has_clubs');
        $this->addSql('DROP TABLE users_has_groups');

        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9CB148FB7');
        $this->addSql('DROP INDEX IDX_1483A5E9CB148FB7 ON users');
        $this->addSql('ALTER TABLE users DROP current_club_id, CHANGE id id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\'');

        $this->addSql('DROP TABLE involvement');
        $this->addSql('CREATE TABLE involvement (id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', user_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:guid)\', club_id INT DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json_array)\', INDEX IDX_EEBBC0B3A76ED395 (user_id), INDEX IDX_EEBBC0B361190A32 (club_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE involvement ADD CONSTRAINT FK_EEBBC0B3A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE involvement ADD CONSTRAINT FK_EEBBC0B361190A32 FOREIGN KEY (club_id) REFERENCES clubs (id)');

        $this->addSql('SET foreign_key_checks = 1;');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE groups (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, roles LONGTEXT NOT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:array)\', UNIQUE INDEX UNIQ_F06D39705E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users_has_clubs (user_id INT NOT NULL, club_id INT NOT NULL, INDEX IDX_38495B7CA76ED395 (user_id), INDEX IDX_38495B7C61190A32 (club_id), PRIMARY KEY(user_id, club_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users_has_groups (user_id INT NOT NULL, group_id INT NOT NULL, INDEX IDX_B24817FA76ED395 (user_id), INDEX IDX_B24817FFE54D947 (group_id), PRIMARY KEY(user_id, group_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE users_has_clubs ADD CONSTRAINT FK_38495B7C61190A32 FOREIGN KEY (club_id) REFERENCES clubs (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE users_has_clubs ADD CONSTRAINT FK_38495B7CA76ED395 FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE users_has_groups ADD CONSTRAINT FK_B24817FA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE users_has_groups ADD CONSTRAINT FK_B24817FFE54D947 FOREIGN KEY (group_id) REFERENCES groups (id)');
        $this->addSql('DROP TABLE involvement');
        $this->addSql('ALTER TABLE users ADD current_club_id INT DEFAULT NULL, CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9CB148FB7 FOREIGN KEY (current_club_id) REFERENCES clubs (id) ON DELETE SET NULL');
        $this->addSql('CREATE INDEX IDX_1483A5E9CB148FB7 ON users (current_club_id)');
    }
}
