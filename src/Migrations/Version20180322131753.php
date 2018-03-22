<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180322131753 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tickets DROP FOREIGN KEY FK_54469DF4AEBAE514');
        $this->addSql('DROP INDEX IDX_54469DF4AEBAE514 ON tickets');
        $this->addSql('ALTER TABLE tickets ADD order_id INT DEFAULT NULL, CHANGE countries_id country_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tickets ADD CONSTRAINT FK_54469DF4F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE tickets ADD CONSTRAINT FK_54469DF48D9F6D38 FOREIGN KEY (order_id) REFERENCES `order` (id)');
        $this->addSql('CREATE INDEX IDX_54469DF4F92F3E70 ON tickets (country_id)');
        $this->addSql('CREATE INDEX IDX_54469DF48D9F6D38 ON tickets (order_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tickets DROP FOREIGN KEY FK_54469DF4F92F3E70');
        $this->addSql('ALTER TABLE tickets DROP FOREIGN KEY FK_54469DF48D9F6D38');
        $this->addSql('DROP INDEX IDX_54469DF4F92F3E70 ON tickets');
        $this->addSql('DROP INDEX IDX_54469DF48D9F6D38 ON tickets');
        $this->addSql('ALTER TABLE tickets ADD countries_id INT DEFAULT NULL, DROP country_id, DROP order_id');
        $this->addSql('ALTER TABLE tickets ADD CONSTRAINT FK_54469DF4AEBAE514 FOREIGN KEY (countries_id) REFERENCES country (id)');
        $this->addSql('CREATE INDEX IDX_54469DF4AEBAE514 ON tickets (countries_id)');
    }
}
