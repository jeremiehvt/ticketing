<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180322181529 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tickets DROP FOREIGN KEY FK_54469DF48D9F6D38');
        $this->addSql('CREATE TABLE command (id INT AUTO_INCREMENT NOT NULL, number_of_places INT NOT NULL, token VARCHAR(255) NOT NULL, date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP INDEX IDX_54469DF48D9F6D38 ON tickets');
        $this->addSql('ALTER TABLE tickets CHANGE order_id command_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tickets ADD CONSTRAINT FK_54469DF433E1689A FOREIGN KEY (command_id) REFERENCES command (id)');
        $this->addSql('CREATE INDEX IDX_54469DF433E1689A ON tickets (command_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tickets DROP FOREIGN KEY FK_54469DF433E1689A');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, date DATETIME NOT NULL, number_of_places INT NOT NULL, token VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE command');
        $this->addSql('DROP INDEX IDX_54469DF433E1689A ON tickets');
        $this->addSql('ALTER TABLE tickets CHANGE command_id order_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tickets ADD CONSTRAINT FK_54469DF48D9F6D38 FOREIGN KEY (order_id) REFERENCES `order` (id)');
        $this->addSql('CREATE INDEX IDX_54469DF48D9F6D38 ON tickets (order_id)');
    }
}
