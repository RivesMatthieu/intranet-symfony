<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210427214346 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE clients (id INT AUTO_INCREMENT NOT NULL, site VARCHAR(255) NOT NULL, actif INT NOT NULL, url VARCHAR(255) NOT NULL, societe VARCHAR(255) NOT NULL, contact VARCHAR(255) DEFAULT NULL, role VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, telephone INT DEFAULT NULL, uniweb TINYINT(1) DEFAULT \'0\' NOT NULL, tma INT DEFAULT NULL, seo INT DEFAULT NULL, sea INT DEFAULT NULL, cms VARCHAR(255) DEFAULT NULL, admin_url VARCHAR(255) DEFAULT NULL, admin_acces VARCHAR(255) DEFAULT NULL, hack TINYINT(1) DEFAULT \'0\' NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE clients');
    }
}
