<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240619140445 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `groups` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, date_created_group DATE NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groups_artist (groups_id INT NOT NULL, artist_id INT NOT NULL, INDEX IDX_D0B35211F373DCF (groups_id), INDEX IDX_D0B35211B7970CF8 (artist_id), PRIMARY KEY(groups_id, artist_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE groups_artist ADD CONSTRAINT FK_D0B35211F373DCF FOREIGN KEY (groups_id) REFERENCES `groups` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groups_artist ADD CONSTRAINT FK_D0B35211B7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE groups_artist DROP FOREIGN KEY FK_D0B35211F373DCF');
        $this->addSql('ALTER TABLE groups_artist DROP FOREIGN KEY FK_D0B35211B7970CF8');
        $this->addSql('DROP TABLE `groups`');
        $this->addSql('DROP TABLE groups_artist');
    }
}
