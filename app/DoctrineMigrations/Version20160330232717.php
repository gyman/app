<?php

namespace Gyman\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160330232717 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE entries DROP FOREIGN KEY FK_2DF8B3C528AA1B6F');
        $this->addSql('ALTER TABLE entries DROP FOREIGN KEY FK_2DF8B3C57597D3FE');
        $this->addSql('ALTER TABLE entries ADD CONSTRAINT FK_2DF8B3C528AA1B6F FOREIGN KEY (voucher_id) REFERENCES vouchers (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE entries ADD CONSTRAINT FK_2DF8B3C57597D3FE FOREIGN KEY (member_id) REFERENCES members (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE vouchers ADD closedAt DATETIME DEFAULT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE entries DROP FOREIGN KEY FK_2DF8B3C57597D3FE');
        $this->addSql('ALTER TABLE entries DROP FOREIGN KEY FK_2DF8B3C528AA1B6F');
        $this->addSql('ALTER TABLE entries ADD CONSTRAINT FK_2DF8B3C57597D3FE FOREIGN KEY (member_id) REFERENCES members (id)');
        $this->addSql('ALTER TABLE entries ADD CONSTRAINT FK_2DF8B3C528AA1B6F FOREIGN KEY (voucher_id) REFERENCES vouchers (id)');
        $this->addSql('ALTER TABLE vouchers DROP closedAt');
    }
}
