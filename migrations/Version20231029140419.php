<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231029140419 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE node ADD type_id INT NOT NULL');
        $this->addSql('ALTER TABLE node ADD CONSTRAINT FK_857FE845C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('CREATE INDEX IDX_857FE845C54C8C93 ON node (type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE node DROP FOREIGN KEY FK_857FE845C54C8C93');
        $this->addSql('DROP INDEX IDX_857FE845C54C8C93 ON node');
        $this->addSql('ALTER TABLE node DROP type_id');
    }
}
