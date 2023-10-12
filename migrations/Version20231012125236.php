<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231012125236 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE album RENAME INDEX fk_label TO IDX_39986E4333B92F39');
        $this->addSql('ALTER TABLE label CHANGE description description TINYTEXT NOT NULL');
        $this->addSql('ALTER TABLE morceau CHANGE piste piste INT NOT NULL');
        $this->addSql('ALTER TABLE morceau ADD CONSTRAINT FK_36BB72081137ABCF FOREIGN KEY (album_id) REFERENCES album (id)');
        $this->addSql('ALTER TABLE style_album ADD CONSTRAINT FK_F34D20B8BACD6074 FOREIGN KEY (style_id) REFERENCES style (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE style_album ADD CONSTRAINT FK_F34D20B81137ABCF FOREIGN KEY (album_id) REFERENCES album (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE style_album DROP FOREIGN KEY FK_F34D20B8BACD6074');
        $this->addSql('ALTER TABLE style_album DROP FOREIGN KEY FK_F34D20B81137ABCF');
        $this->addSql('ALTER TABLE album RENAME INDEX idx_39986e4333b92f39 TO FK_label');
        $this->addSql('ALTER TABLE label CHANGE description description TEXT NOT NULL');
        $this->addSql('ALTER TABLE morceau DROP FOREIGN KEY FK_36BB72081137ABCF');
        $this->addSql('ALTER TABLE morceau CHANGE piste piste INT DEFAULT NULL');
    }
}
