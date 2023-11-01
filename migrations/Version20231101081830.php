<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231101081830 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql("INSERT INTO `user` VALUES (1,'admin','[\"ROLE_ADMIN\"]','$2y$13\$ByVYeD9olwB4QHPG8PZihOb0tARRcuG1koYbczlCWHwIt0YdvrvzO',NULL,NULL,NULL,NULL,'2023-10-30 13:34:01','2023-10-30 13:34:01',NULL,NULL)");
        $this->addSql("INSERT INTO `type` VALUES (1,'刑事诉讼'),(2,'行政诉讼'),(3,'民事诉讼')");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
