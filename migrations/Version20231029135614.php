<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231029135614 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE node DROP FOREIGN KEY FK_857FE84589AF7860');
        $this->addSql('DROP INDEX IDX_857FE84589AF7860 ON node');
        $this->addSql('ALTER TABLE node DROP firm_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE node ADD firm_id INT NOT NULL');
        $this->addSql('ALTER TABLE node ADD CONSTRAINT FK_857FE84589AF7860 FOREIGN KEY (firm_id) REFERENCES firm (id)');
        $this->addSql('CREATE INDEX IDX_857FE84589AF7860 ON node (firm_id)');
    }
}
