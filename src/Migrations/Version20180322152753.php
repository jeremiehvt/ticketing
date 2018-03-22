<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180322152753 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tickets DROP FOREIGN KEY FK_54469DF4361ADCB4');
        $this->addSql('ALTER TABLE tickets DROP FOREIGN KEY FK_54469DF4F92F3E70');
        $this->addSql('DROP INDEX IDX_54469DF4361ADCB4 ON tickets');
        $this->addSql('DROP INDEX IDX_54469DF4F92F3E70 ON tickets');
        $this->addSql('ALTER TABLE tickets ADD tyckets_types_id INT DEFAULT NULL, ADD countries_id INT DEFAULT NULL, DROP tyckets_type_id, DROP country_id');
        $this->addSql('ALTER TABLE tickets ADD CONSTRAINT FK_54469DF42B4BD06C FOREIGN KEY (tyckets_types_id) REFERENCES tyckets_type (id)');
        $this->addSql('ALTER TABLE tickets ADD CONSTRAINT FK_54469DF4AEBAE514 FOREIGN KEY (countries_id) REFERENCES country (id)');
        $this->addSql('CREATE INDEX IDX_54469DF42B4BD06C ON tickets (tyckets_types_id)');
        $this->addSql('CREATE INDEX IDX_54469DF4AEBAE514 ON tickets (countries_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tickets DROP FOREIGN KEY FK_54469DF42B4BD06C');
        $this->addSql('ALTER TABLE tickets DROP FOREIGN KEY FK_54469DF4AEBAE514');
        $this->addSql('DROP INDEX IDX_54469DF42B4BD06C ON tickets');
        $this->addSql('DROP INDEX IDX_54469DF4AEBAE514 ON tickets');
        $this->addSql('ALTER TABLE tickets ADD tyckets_type_id INT DEFAULT NULL, ADD country_id INT DEFAULT NULL, DROP tyckets_types_id, DROP countries_id');
        $this->addSql('ALTER TABLE tickets ADD CONSTRAINT FK_54469DF4361ADCB4 FOREIGN KEY (tyckets_type_id) REFERENCES tyckets_type (id)');
        $this->addSql('ALTER TABLE tickets ADD CONSTRAINT FK_54469DF4F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('CREATE INDEX IDX_54469DF4361ADCB4 ON tickets (tyckets_type_id)');
        $this->addSql('CREATE INDEX IDX_54469DF4F92F3E70 ON tickets (country_id)');
    }
}
