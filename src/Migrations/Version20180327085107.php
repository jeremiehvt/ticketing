<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180327085107 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tickets DROP FOREIGN KEY FK_54469DF42B4BD06C');
        $this->addSql('DROP INDEX IDX_54469DF42B4BD06C ON tickets');
        $this->addSql('ALTER TABLE tickets DROP tyckets_types_id, DROP email, DROP visit_day');
        $this->addSql('ALTER TABLE command ADD email VARCHAR(255) NOT NULL, ADD visit_day DATETIME NOT NULL, ADD tyckets_type TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE command DROP email, DROP visit_day, DROP tyckets_type');
        $this->addSql('ALTER TABLE tickets ADD tyckets_types_id INT DEFAULT NULL, ADD email VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, ADD visit_day DATETIME NOT NULL');
        $this->addSql('ALTER TABLE tickets ADD CONSTRAINT FK_54469DF42B4BD06C FOREIGN KEY (tyckets_types_id) REFERENCES tyckets_type (id)');
        $this->addSql('CREATE INDEX IDX_54469DF42B4BD06C ON tickets (tyckets_types_id)');
    }
}
