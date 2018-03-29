<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180329122506 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE tickets');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE tickets (id INT AUTO_INCREMENT NOT NULL, command_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, first_name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, birth_day DATE NOT NULL, special_rate TINYINT(1) DEFAULT NULL, country VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, INDEX IDX_54469DF433E1689A (command_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tickets ADD CONSTRAINT FK_54469DF433E1689A FOREIGN KEY (command_id) REFERENCES command (id)');
    }
}
