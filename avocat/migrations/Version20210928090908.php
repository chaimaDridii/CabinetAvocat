<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210928090908 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE affaire ADD type_affaire_id INT NOT NULL');
        $this->addSql('ALTER TABLE affaire ADD CONSTRAINT FK_9C3F18EFED813170 FOREIGN KEY (type_affaire_id) REFERENCES type_affaire (id)');
        $this->addSql('CREATE INDEX IDX_9C3F18EFED813170 ON affaire (type_affaire_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE affaire DROP FOREIGN KEY FK_9C3F18EFED813170');
        $this->addSql('DROP INDEX IDX_9C3F18EFED813170 ON affaire');
        $this->addSql('ALTER TABLE affaire DROP type_affaire_id');
    }
}
