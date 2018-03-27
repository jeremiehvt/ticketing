<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180327132551 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tickets DROP FOREIGN KEY FK_54469DF4AEBAE514');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP INDEX IDX_54469DF4AEBAE514 ON tickets');
        $this->addSql('ALTER TABLE tickets ADD country VARCHAR(255) NOT NULL, DROP countries_id');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tickets ADD countries_id INT DEFAULT NULL, DROP country');
        $this->addSql('ALTER TABLE tickets ADD CONSTRAINT FK_54469DF4AEBAE514 FOREIGN KEY (countries_id) REFERENCES country (id)');
        $this->addSql('CREATE INDEX IDX_54469DF4AEBAE514 ON tickets (countries_id)');
    }
}
