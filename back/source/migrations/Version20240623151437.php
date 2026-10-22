<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240623151437 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE concert (id INT AUTO_INCREMENT NOT NULL, descriptions LONGTEXT NOT NULL, date_concert DATETIME NOT NULL, pictures VARCHAR(255) NOT NULL, tag VARCHAR(255) NOT NULL, prix INT NOT NULL, number_of_place INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE concert_groups (concert_id INT NOT NULL, groups_id INT NOT NULL, INDEX IDX_556229F183C97B2E (concert_id), INDEX IDX_556229F1F373DCF (groups_id), PRIMARY KEY(concert_id, groups_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE concert_groups ADD CONSTRAINT FK_556229F183C97B2E FOREIGN KEY (concert_id) REFERENCES concert (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE concert_groups ADD CONSTRAINT FK_556229F1F373DCF FOREIGN KEY (groups_id) REFERENCES `groups` (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE concert_groups DROP FOREIGN KEY FK_556229F183C97B2E');
        $this->addSql('ALTER TABLE concert_groups DROP FOREIGN KEY FK_556229F1F373DCF');
        $this->addSql('DROP TABLE concert');
        $this->addSql('DROP TABLE concert_groups');
    }
}
