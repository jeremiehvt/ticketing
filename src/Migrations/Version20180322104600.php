<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180322104600 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE tickets (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, birth_day DATE NOT NULL, special_rate TINYINT(1) DEFAULT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `order` DROP name, DROP first_name, DROP birth_day, DROP special_rate, DROP email');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE tickets');
        $this->addSql('ALTER TABLE `order` ADD name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, ADD first_name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, ADD birth_day DATE NOT NULL, ADD special_rate TINYINT(1) DEFAULT NULL, ADD email VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci');
    }
}
