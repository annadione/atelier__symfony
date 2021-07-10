<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210710122211 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE chauffeur (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, telephone INT NOT NULL, numero_cni VARCHAR(255) NOT NULL, login VARCHAR(255) NOT NULL, pass_word VARCHAR(255) NOT NULL, permis VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voiture (id INT AUTO_INCREMENT NOT NULL, chaufvoit_id INT DEFAULT NULL, matricule VARCHAR(255) NOT NULL, marque VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, assurance VARCHAR(255) NOT NULL, carte_grise VARCHAR(255) NOT NULL, INDEX IDX_E9E2810FC3FE2949 (chaufvoit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE voiture ADD CONSTRAINT FK_E9E2810FC3FE2949 FOREIGN KEY (chaufvoit_id) REFERENCES chauffeur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE voiture DROP FOREIGN KEY FK_E9E2810FC3FE2949');
        $this->addSql('DROP TABLE chauffeur');
        $this->addSql('DROP TABLE voiture');
    }
}
