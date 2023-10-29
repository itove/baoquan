<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231029131207 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD firm_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64989AF7860 FOREIGN KEY (firm_id) REFERENCES firm (id)');
        $this->addSql('CREATE INDEX IDX_8D93D64989AF7860 ON user (firm_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D64989AF7860');
        $this->addSql('DROP INDEX IDX_8D93D64989AF7860 ON `user`');
        $this->addSql('ALTER TABLE `user` DROP firm_id');
    }
}
