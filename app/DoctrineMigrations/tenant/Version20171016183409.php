<?php declare(strict_types = 1);

namespace Gyman\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171016183409 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE calendars CHANGE id id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', CHANGE name title VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE events DROP FOREIGN KEY FK_5387574A49EDA465');
        $this->addSql('ALTER TABLE events DROP FOREIGN KEY FK_5387574A6E1CF08F');
        $this->addSql('DROP INDEX IDX_5387574A6E1CF08F ON events');
        $this->addSql('DROP INDEX IDX_5387574A49EDA465 ON events');
        $this->addSql('ALTER TABLE events DROP previous_event_id, DROP next_event_id, DROP minutes, CHANGE id id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', CHANGE calendar_id calendar_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', CHANGE weekdays repetitions_weekdays LONGTEXT NOT NULL COMMENT \'(DC2Type:json_array)\'');
        $this->addSql('ALTER TABLE entries CHANGE member_id member_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', CHANGE occurrence_id occurrence_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE users ADD member_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', ADD invitationToken VARCHAR(255) DEFAULT NULL, DROP locked, DROP expired, DROP expires_at, DROP credentials_expired, DROP credentials_expire_at, CHANGE id id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', CHANGE username username VARCHAR(180) NOT NULL, CHANGE username_canonical username_canonical VARCHAR(180) NOT NULL, CHANGE email email VARCHAR(180) NOT NULL, CHANGE email_canonical email_canonical VARCHAR(180) NOT NULL, CHANGE salt salt VARCHAR(255) DEFAULT NULL, CHANGE confirmation_token confirmation_token VARCHAR(180) DEFAULT NULL');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E97597D3FE FOREIGN KEY (member_id) REFERENCES members (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E9C05FB297 ON users (confirmation_token)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E97597D3FE ON users (member_id)');
        $this->addSql('ALTER TABLE vouchers CHANGE member_id member_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE members CHANGE id id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE member_section CHANGE member_id member_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', CHANGE section_id section_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('DROP INDEX UNIQ_2B9643982B36786B ON sections');
        $this->addSql('ALTER TABLE sections ADD deleted_at DATETIME DEFAULT NULL, ADD createdAt DATETIME DEFAULT NULL, ADD updatedAt DATETIME DEFAULT NULL, ADD orderNumber INT NOT NULL, CHANGE id id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', CHANGE calendar_id calendar_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE occurrences ADD duration_minutes INT DEFAULT NULL, ADD subject_content LONGTEXT DEFAULT NULL, ADD note_content LONGTEXT DEFAULT NULL, DROP minutes, DROP deletedAt, CHANGE id id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', CHANGE event_id event_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', CHANGE instructor_id instructor_id INT DEFAULT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE calendars CHANGE id id CHAR(36) NOT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:guid)\', CHANGE title name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE entries CHANGE member_id member_id CHAR(36) DEFAULT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:guid)\', CHANGE occurrence_id occurrence_id CHAR(36) DEFAULT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:guid)\'');
        $this->addSql('ALTER TABLE events ADD previous_event_id CHAR(36) DEFAULT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:guid)\', ADD next_event_id CHAR(36) DEFAULT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:guid)\', ADD minutes INT NOT NULL, CHANGE id id CHAR(36) NOT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:guid)\', CHANGE calendar_id calendar_id CHAR(36) DEFAULT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:guid)\', CHANGE repetitions_weekdays weekdays LONGTEXT NOT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:json_array)\'');
        $this->addSql('ALTER TABLE events ADD CONSTRAINT FK_5387574A49EDA465 FOREIGN KEY (next_event_id) REFERENCES events (id)');
        $this->addSql('ALTER TABLE events ADD CONSTRAINT FK_5387574A6E1CF08F FOREIGN KEY (previous_event_id) REFERENCES events (id)');
        $this->addSql('CREATE INDEX IDX_5387574A6E1CF08F ON events (previous_event_id)');
        $this->addSql('CREATE INDEX IDX_5387574A49EDA465 ON events (next_event_id)');
        $this->addSql('ALTER TABLE member_section CHANGE member_id member_id CHAR(36) NOT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:guid)\', CHANGE section_id section_id CHAR(36) NOT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:guid)\'');
        $this->addSql('ALTER TABLE members CHANGE id id CHAR(36) NOT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:guid)\'');
        $this->addSql('ALTER TABLE occurrences ADD minutes INT NOT NULL, ADD deletedAt DATETIME DEFAULT NULL, DROP duration_minutes, DROP subject_content, DROP note_content, CHANGE id id CHAR(36) NOT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:guid)\', CHANGE event_id event_id CHAR(36) DEFAULT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:guid)\', CHANGE instructor_id instructor_id VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE sections DROP deleted_at, DROP createdAt, DROP updatedAt, DROP orderNumber, CHANGE id id CHAR(36) NOT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:guid)\', CHANGE calendar_id calendar_id CHAR(36) DEFAULT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:guid)\'');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2B9643982B36786B ON sections (title)');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E97597D3FE');
        $this->addSql('DROP INDEX UNIQ_1483A5E9C05FB297 ON users');
        $this->addSql('DROP INDEX UNIQ_1483A5E97597D3FE ON users');
        $this->addSql('ALTER TABLE users ADD locked TINYINT(1) NOT NULL, ADD expired TINYINT(1) NOT NULL, ADD expires_at DATETIME DEFAULT NULL, ADD credentials_expired TINYINT(1) NOT NULL, ADD credentials_expire_at DATETIME DEFAULT NULL, DROP member_id, DROP invitationToken, CHANGE id id CHAR(36) NOT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:guid)\', CHANGE username username VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE username_canonical username_canonical VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE email email VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE email_canonical email_canonical VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE salt salt VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, CHANGE confirmation_token confirmation_token VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE vouchers CHANGE member_id member_id CHAR(36) DEFAULT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:guid)\'');
    }
}
