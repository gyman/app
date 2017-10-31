<?php declare(strict_types = 1);

namespace Gyman\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171031222654 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE events CHANGE calendar_id calendar_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', CHANGE deletedAt deletedAt DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE calendars CHANGE deletedAt deletedAt DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE sections CHANGE calendar_id calendar_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', CHANGE deleted_at deleted_at DATETIME DEFAULT NULL, CHANGE createdAt createdAt DATETIME DEFAULT NULL, CHANGE updatedAt updatedAt DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE entries CHANGE member_id member_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', CHANGE voucher_id voucher_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:guid)\', CHANGE occurrence_id occurrence_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', CHANGE endDate endDate DATETIME DEFAULT NULL, CHANGE deletedAt deletedAt DATETIME DEFAULT NULL, CHANGE price_amount price_amount NUMERIC(10, 2) DEFAULT NULL, CHANGE price_currency price_currency VARCHAR(10) DEFAULT NULL');
        $this->addSql('ALTER TABLE members CHANGE current_voucher_id current_voucher_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:guid)\', CHANGE last_entry_id last_entry_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:guid)\', CHANGE nameSlug nameSlug VARCHAR(255) DEFAULT NULL, CHANGE deletedAt deletedAt DATETIME DEFAULT NULL, CHANGE createdAt createdAt DATETIME DEFAULT NULL, CHANGE updatedAt updatedAt DATETIME DEFAULT NULL, CHANGE birthdate birthdate DATE DEFAULT NULL, CHANGE phone phone VARCHAR(64) DEFAULT NULL, CHANGE zipcode zipcode VARCHAR(255) DEFAULT NULL, CHANGE gender gender VARCHAR(255) DEFAULT NULL, CHANGE starred starred TINYINT(1) DEFAULT NULL, CHANGE color color VARCHAR(255) DEFAULT NULL, CHANGE foto foto VARCHAR(255) DEFAULT NULL, CHANGE barcode barcode VARCHAR(64) DEFAULT NULL');
        $this->addSql('ALTER TABLE occurrences CHANGE event_id event_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', CHANGE instructor_id instructor_id INT DEFAULT NULL, CHANGE duration_minutes duration_minutes INT DEFAULT NULL');
        $this->addSql('ALTER TABLE users CHANGE member_id member_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', CHANGE salt salt VARCHAR(255) DEFAULT NULL, CHANGE last_login last_login DATETIME DEFAULT NULL, CHANGE confirmation_token confirmation_token VARCHAR(180) DEFAULT NULL, CHANGE password_requested_at password_requested_at DATETIME DEFAULT NULL, CHANGE firstname firstname VARCHAR(255) DEFAULT NULL, CHANGE lastname lastname VARCHAR(255) DEFAULT NULL, CHANGE invitationToken invitationToken VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE vouchers CHANGE member_id member_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', CHANGE startDate startDate DATETIME DEFAULT NULL, CHANGE endDate endDate DATETIME DEFAULT NULL, CHANGE maximumAmount maximumAmount INT DEFAULT NULL, CHANGE deletedAt deletedAt DATETIME DEFAULT NULL, CHANGE createdAt createdAt DATETIME DEFAULT NULL, CHANGE updatedAt updatedAt DATETIME DEFAULT NULL, CHANGE closedAt closedAt DATETIME DEFAULT NULL, CHANGE price_amount price_amount NUMERIC(10, 2) DEFAULT NULL, CHANGE price_currency price_currency VARCHAR(10) DEFAULT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE calendars CHANGE deletedAt deletedAt DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE entries CHANGE member_id member_id CHAR(36) DEFAULT \'NULL\' COLLATE utf8_unicode_ci COMMENT \'(DC2Type:uuid)\', CHANGE voucher_id voucher_id CHAR(36) DEFAULT \'NULL\' COLLATE utf8_unicode_ci COMMENT \'(DC2Type:guid)\', CHANGE occurrence_id occurrence_id CHAR(36) DEFAULT \'NULL\' COLLATE utf8_unicode_ci COMMENT \'(DC2Type:uuid)\', CHANGE endDate endDate DATETIME DEFAULT \'NULL\', CHANGE deletedAt deletedAt DATETIME DEFAULT \'NULL\', CHANGE price_amount price_amount NUMERIC(10, 2) DEFAULT \'NULL\', CHANGE price_currency price_currency VARCHAR(10) DEFAULT \'NULL\' COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE events CHANGE calendar_id calendar_id CHAR(36) DEFAULT \'NULL\' COLLATE utf8_unicode_ci COMMENT \'(DC2Type:uuid)\', CHANGE deletedAt deletedAt DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE members CHANGE current_voucher_id current_voucher_id CHAR(36) DEFAULT \'NULL\' COLLATE utf8_unicode_ci COMMENT \'(DC2Type:guid)\', CHANGE last_entry_id last_entry_id CHAR(36) DEFAULT \'NULL\' COLLATE utf8_unicode_ci COMMENT \'(DC2Type:guid)\', CHANGE nameSlug nameSlug VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE deletedAt deletedAt DATETIME DEFAULT \'NULL\', CHANGE createdAt createdAt DATETIME DEFAULT \'NULL\', CHANGE updatedAt updatedAt DATETIME DEFAULT \'NULL\', CHANGE birthdate birthdate DATE DEFAULT \'NULL\', CHANGE phone phone VARCHAR(64) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE zipcode zipcode VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE gender gender VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE starred starred TINYINT(1) DEFAULT \'NULL\', CHANGE color color VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE foto foto VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE barcode barcode VARCHAR(64) DEFAULT \'NULL\' COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE occurrences CHANGE event_id event_id CHAR(36) DEFAULT \'NULL\' COLLATE utf8_unicode_ci COMMENT \'(DC2Type:uuid)\', CHANGE instructor_id instructor_id INT DEFAULT NULL, CHANGE duration_minutes duration_minutes INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sections CHANGE calendar_id calendar_id CHAR(36) DEFAULT \'NULL\' COLLATE utf8_unicode_ci COMMENT \'(DC2Type:uuid)\', CHANGE deleted_at deleted_at DATETIME DEFAULT \'NULL\', CHANGE createdAt createdAt DATETIME DEFAULT \'NULL\', CHANGE updatedAt updatedAt DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE users CHANGE member_id member_id CHAR(36) DEFAULT \'NULL\' COLLATE utf8_unicode_ci COMMENT \'(DC2Type:uuid)\', CHANGE salt salt VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE last_login last_login DATETIME DEFAULT \'NULL\', CHANGE confirmation_token confirmation_token VARCHAR(180) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE password_requested_at password_requested_at DATETIME DEFAULT \'NULL\', CHANGE firstname firstname VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE lastname lastname VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci, CHANGE invitationToken invitationToken VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE vouchers CHANGE member_id member_id CHAR(36) DEFAULT \'NULL\' COLLATE utf8_unicode_ci COMMENT \'(DC2Type:uuid)\', CHANGE startDate startDate DATETIME DEFAULT \'NULL\', CHANGE endDate endDate DATETIME DEFAULT \'NULL\', CHANGE maximumAmount maximumAmount INT DEFAULT NULL, CHANGE deletedAt deletedAt DATETIME DEFAULT \'NULL\', CHANGE createdAt createdAt DATETIME DEFAULT \'NULL\', CHANGE updatedAt updatedAt DATETIME DEFAULT \'NULL\', CHANGE closedAt closedAt DATETIME DEFAULT \'NULL\', CHANGE price_amount price_amount NUMERIC(10, 2) DEFAULT \'NULL\', CHANGE price_currency price_currency VARCHAR(10) DEFAULT \'NULL\' COLLATE utf8_unicode_ci');
    }
}
