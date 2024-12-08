<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210928091713 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dossier ADD id_client_id INT NOT NULL');
        $this->addSql('ALTER TABLE dossier ADD CONSTRAINT FK_3D48E03799DED506 FOREIGN KEY (id_client_id) REFERENCES client (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3D48E03799DED506 ON dossier (id_client_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dossier DROP FOREIGN KEY FK_3D48E03799DED506');
        $this->addSql('DROP INDEX UNIQ_3D48E03799DED506 ON dossier');
        $this->addSql('ALTER TABLE dossier DROP id_client_id');
    }
}
