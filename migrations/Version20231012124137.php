<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231012124137 extends AbstractMigration
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
        $this->addSql('ALTER TABLE album ADD label_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE album ADD CONSTRAINT FK_39986E4333B92F39 FOREIGN KEY (label_id) REFERENCES label (id)');
        $this->addSql('CREATE INDEX IDX_39986E4333B92F39 ON album (label_id)');
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
        $this->addSql('ALTER TABLE album DROP FOREIGN KEY FK_39986E4333B92F39');
        $this->addSql('DROP INDEX IDX_39986E4333B92F39 ON album');
        $this->addSql('ALTER TABLE album DROP label_id');
        $this->addSql('ALTER TABLE morceau DROP FOREIGN KEY FK_36BB72081137ABCF');
        $this->addSql('ALTER TABLE morceau CHANGE piste piste INT DEFAULT NULL');
    }
}
