<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231012121554 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE album ADD label_id INT DEFAULT NULL');
    $this->addSql('ALTER TABLE album ADD CONSTRAINT FK_label FOREIGN KEY (label_id) REFERENCES label (id)');
        $this->addSql('CREATE TABLE label (id INT AUTO_INCREMENT NOT NULL, albums_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, description TINYTEXT NOT NULL, annee INT NOT NULL, type VARCHAR(255) NOT NULL, logo VARCHAR(255) NOT NULL, INDEX IDX_EA750E8ECBB55AF (albums_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE label ADD CONSTRAINT FK_EA750E8ECBB55AF FOREIGN KEY (albums_id) REFERENCES album (id)');
        $this->addSql('ALTER TABLE album DROP FOREIGN KEY FK_39986E4321D25844');
        $this->addSql('ALTER TABLE album ADD CONSTRAINT FK_39986E4321D25844 FOREIGN KEY (artiste_id) REFERENCES artiste (id)');
        $this->addSql('ALTER TABLE artiste CHANGE description description LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE morceau CHANGE piste piste INT NOT NULL');
        $this->addSql('ALTER TABLE morceau ADD CONSTRAINT FK_36BB72081137ABCF FOREIGN KEY (album_id) REFERENCES album (id)');
        $this->addSql('ALTER TABLE style_album ADD CONSTRAINT FK_F34D20B8BACD6074 FOREIGN KEY (style_id) REFERENCES style (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE style_album ADD CONSTRAINT FK_F34D20B81137ABCF FOREIGN KEY (album_id) REFERENCES album (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE label DROP FOREIGN KEY FK_EA750E8ECBB55AF');
        $this->addSql('DROP TABLE label');
        $this->addSql('ALTER TABLE album DROP FOREIGN KEY FK_39986E4321D25844');
        $this->addSql('ALTER TABLE album ADD CONSTRAINT FK_39986E4321D25844 FOREIGN KEY (artiste_id) REFERENCES artiste (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artiste CHANGE description description LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE morceau DROP FOREIGN KEY FK_36BB72081137ABCF');
        $this->addSql('ALTER TABLE morceau CHANGE piste piste INT DEFAULT NULL');
        $this->addSql('ALTER TABLE style_album DROP FOREIGN KEY FK_F34D20B8BACD6074');
        $this->addSql('ALTER TABLE style_album DROP FOREIGN KEY FK_F34D20B81137ABCF');
    }
}
