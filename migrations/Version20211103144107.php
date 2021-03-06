<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211103144107 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom_categorie VARCHAR(60) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media (id INT AUTO_INCREMENT NOT NULL, nom_media VARCHAR(60) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, media_id INT DEFAULT NULL, categorie_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, prenom VARCHAR(60) NOT NULL, date_naissance DATE NOT NULL, ville VARCHAR(50) NOT NULL, descript LONGTEXT DEFAULT NULL, telephone VARCHAR(10) NOT NULL, genre VARCHAR(20) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D649EA9FDD75 (media_id), INDEX IDX_8D93D649BCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_like_media (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, media_id INT NOT NULL, like_media TINYINT(1) DEFAULT NULL, INDEX IDX_7A2F4E07A76ED395 (user_id), INDEX IDX_7A2F4E07EA9FDD75 (media_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE user_like_media ADD CONSTRAINT FK_7A2F4E07A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_like_media ADD CONSTRAINT FK_7A2F4E07EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649BCF5E72D');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649EA9FDD75');
        $this->addSql('ALTER TABLE user_like_media DROP FOREIGN KEY FK_7A2F4E07EA9FDD75');
        $this->addSql('ALTER TABLE user_like_media DROP FOREIGN KEY FK_7A2F4E07A76ED395');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_like_media');
    }
}
