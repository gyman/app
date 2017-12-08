<?php declare(strict_types = 1);

namespace Gyman\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171201203840 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE involvement DROP FOREIGN KEY FK_EEBBC0B3A76ED395');
        $this->addSql('DROP TABLE involvement');
        $this->addSql('DROP TABLE users');
        $this->addSql('ALTER TABLE clubs ADD database_host VARCHAR(256) NOT NULL, CHANGE details_address details_address VARCHAR(255) DEFAULT NULL, CHANGE details_zipcode details_zipcode VARCHAR(255) DEFAULT NULL, CHANGE details_city details_city VARCHAR(255) DEFAULT NULL, CHANGE details_country details_country VARCHAR(255) DEFAULT NULL, CHANGE details_phone_number details_phone_number VARCHAR(255) DEFAULT NULL, CHANGE details_email_address details_email_address VARCHAR(255) DEFAULT NULL, CHANGE details_opened_from details_opened_from VARCHAR(255) DEFAULT NULL, CHANGE details_opened_till details_opened_till VARCHAR(255) DEFAULT NULL, CHANGE details_logo details_logo VARCHAR(255) DEFAULT NULL, CHANGE details_about details_about VARCHAR(255) DEFAULT NULL, CHANGE details_account_number details_account_number VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE involvement (id CHAR(36) NOT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:guid)\', user_id CHAR(36) DEFAULT \'NULL\' COLLATE utf8_unicode_ci COMMENT \'(DC2Type:guid)\', club_id INT DEFAULT NULL, roles LONGTEXT NOT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:json_array)\', INDEX IDX_EEBBC0B3A76ED395 (user_id), INDEX IDX_EEBBC0B361190A32 (club_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id CHAR(36) NOT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:guid)\', username VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, username_canonical VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, email VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, email_canonical VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, password VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, last_login DATETIME DEFAULT \'NULL\', locked TINYINT(1) DEFAULT \'0\' NOT NULL, expired TINYINT(1) DEFAULT \'NULL\', expires_at DATETIME DEFAULT \'NULL\', confirmation_token VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, password_requested_at DATETIME DEFAULT \'NULL\', roles LONGTEXT NOT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:array)\', credentials_expired TINYINT(1) DEFAULT \'NULL\', credentials_expire_at DATETIME DEFAULT \'NULL\', firstname VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, lastname VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, UNIQUE INDEX UNIQ_1483A5E992FC23A8 (username_canonical), UNIQUE INDEX UNIQ_1483A5E9A0D96FBF (email_canonical), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE involvement ADD CONSTRAINT FK_EEBBC0B361190A32 FOREIGN KEY (club_id) REFERENCES clubs (id)');
        $this->addSql('ALTER TABLE involvement ADD CONSTRAINT FK_EEBBC0B3A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE clubs DROP database_host, CHANGE details_address details_address VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE details_zipcode details_zipcode VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE details_city details_city VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE details_country details_country VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE details_phone_number details_phone_number VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE details_email_address details_email_address VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE details_opened_from details_opened_from VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE details_opened_till details_opened_till VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE details_logo details_logo VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE details_about details_about VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE details_account_number details_account_number VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci');
    }
}
